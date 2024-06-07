<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogGallery;
use App\Models\Destination;
use App\Models\DestinationCategory;
use App\Models\DestinationGallery;
use App\Models\Kabupaten;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
       

        $destinations = Destination::with('galleries')
        ->where('is_share', 1)
        ->orderBy('views', 'desc')
        ->paginate(8);

        $accommodations = Accommodation::with('galleries')
        ->where('is_share', 1)
        ->paginate(8);

        $kabupatens = Kabupaten::get();

        $blogCategories = BlogCategory::all();

        $blogs = Blog::with('galleries')
        ->where('is_share', 1)
        ->paginate(8);

        $destinationCategories = DestinationCategory::all();

        $restaurants = Restaurant::with('galleries')
        ->where('is_share', 1)
        ->paginate(8);

        return view('front.gallery.index', compact('destinations', 'kabupatens', 'blogCategories','restaurants', 'destinationCategories', 'blogs', 'accommodations'));
    }
}
