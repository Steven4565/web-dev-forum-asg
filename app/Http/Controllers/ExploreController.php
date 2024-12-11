<?php

namespace App\Http\Controllers;

use App\Models\ImagePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExploreController extends Controller
{
    public function index()
    {
        $images = ImagePost::all();
        foreach ($images as $image) {
            $image->url = Storage::url($image["url"]);
        }

        return view('explore.index', compact('images'));
    }

    public function create()
    {
        return view('explore.create');
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');

        if (!Storage::exists('imagePosts')) {
            Storage::makeDirectory('imagePosts');
        }

        $path = $request->file('image')->store('imagePosts', 'public');

        ImagePost::create([
            'title' => $title,
            'description' => $description,
            'url' => $path,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->to('/explore');
    }
}
