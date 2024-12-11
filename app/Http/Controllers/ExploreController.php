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
        $images = [
            ['url' => 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg', 'description' => 'Image 1', 'title' => 'image 1 title'],
            ['url' => 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg', 'description' => 'Image 2', 'title' => 'image 2 title'],
            // Add more images here...
        ];
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
