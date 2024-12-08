<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $images = [
            ['src' => 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg', 'description' => 'Image 1'],
            ['src' => 'https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg', 'description' => 'Image 2'],
            // Add more images here...
        ];
        return view('explore.index', compact('images'));
    }

}
