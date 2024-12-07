<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $posts = DB::table('forum_posts')
            ->join('users', 'forum_posts.user_id', '=', 'users.id')
            ->select('forum_posts.*', 'users.name as user_name')
            ->paginate(20);
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

    public function show(ForumPost $forum)
    {
        return view('forum.show', compact('forum'));
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
