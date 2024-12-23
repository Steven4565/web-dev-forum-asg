<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\ForumComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $posts = DB::table('forum_posts')
            ->leftJoin('users', 'forum_posts.user_id', '=', 'users.id')
            ->leftJoin('forum_comments', 'forum_comments.forum_post_id', '=', 'forum_posts.id')
            ->select(
                'forum_posts.*',
                'users.name as user_name',
                DB::raw('COUNT(forum_comments.id) as comment_count')
            )
            ->groupBy('forum_posts.id', 'users.id')
            ->paginate(10);

        return view('forum.index', compact('posts'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        ForumPost::create($validatedData);

        return redirect()->route('forum.index');
    }

    public function storeComment(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
            'forum_post_id' => 'required|int',
            'parent_id' => 'int'
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        $comment = ForumComment::create($validatedData);

        return redirect()->back();
    }

    private function setCounts(Collection $comments, $level = 0)
    {
        foreach ($comments as $comment) {
            $comment->reply_count = ForumComment::where('parent_id', $comment->id)->count();
            $upvote_count = 0;
            $downvote_count = 0;

            $voters = $comment->voters()->get();
            foreach ($voters as $voter) {
                if ($voter->pivot->vote_value == 1)
                    $upvote_count++;
                if ($voter->pivot->vote_value == -1)
                    $downvote_count++;
            }

            $comment->upvote_count = $upvote_count;
            $comment->downvote_count = $downvote_count;


            if ($comment->reply_count > 0) {
                $this->setCounts($comment->replies, $level + 1);
            }
        }
    }

    public function show(Request $request, ForumPost $forum)
    {
        if ($request->has('view') && $request->query('view') === 'true') {
            ForumPost::where('id', $forum->id)->increment('views');
            return redirect($request->url());
        }


        $comments = ForumComment::where('forum_post_id', $forum->id)->whereNull('parent_id')->get();
        $this->setCounts($comments);

        return view('forum.show', compact('forum', 'comments'));
    }

    public function edit(ForumPost $imagePost)
    {
        //
    }

    public function update(Request $request, ForumPost $imagePost)
    {
        //
    }

    public function destroy(ForumPost $imagePost)
    {
        //
    }
}
