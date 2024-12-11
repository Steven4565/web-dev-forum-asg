<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
