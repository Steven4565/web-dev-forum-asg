<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        return view('forum.index');
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ForumPost $forum)
    {
        return view('forum.show', $forum);
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
