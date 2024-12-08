<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\ForumComment;
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

        ForumComment::create($validatedData);
        return redirect()->back();
    }

    public function show(ForumPost $forum)
    {
        ForumPost::where('id', $forum->id)->increment('views');
        $forum->views++;

        $comments = ForumComment::where('forum_post_id', $forum->id)->whereNull('parent_id')->get();
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
