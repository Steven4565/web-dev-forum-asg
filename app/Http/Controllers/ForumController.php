<?php

namespace App\Http\Controllers;

use App\Models\ImagePost;
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

    public function show(ImagePost $imagePost)
    {
        //
    }

    public function edit(ImagePost $imagePost)
    {
        //
    }

    public function update(Request $request, ImagePost $imagePost)
    {
        //
    }

    public function destroy(ImagePost $imagePost)
    {
        //
    }
}
