<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Testimony;
use App\Models\DestinationCategory;
use App\Models\Kabupaten;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index(Request $request)
    {

        $selectedCategory = $request->input('category');

        $selectedKabupaten = $request->input('kabupaten');

        if ($selectedCategory != null && $selectedKabupaten == null) {
            $destinations = Destination::with('galleries')
                ->where('destination_category_id', $selectedCategory)
                ->where('is_share', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        } else if ($selectedCategory == null && $selectedKabupaten != null) {
            $destinations = Destination::with('galleries')
                ->where('kabupaten_id', $selectedKabupaten)
                ->where('is_share', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        } else if ($selectedCategory != null  && $selectedKabupaten != null) {
            $destinations = Destination::with('galleries')
                ->where('destination_category_id', $selectedCategory)
                ->where('kabupaten_id', $selectedKabupaten)
                ->where('is_share', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        } else {

            $destinations = Destination::with('galleries')
                ->where('is_share', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        }


        $popularDestinations = Destination::with('galleries')
            ->where('is_share', 1)
            ->orderBy('views', 'desc') // Order by views in descending order
            ->get();

        $kabupatens = Kabupaten::get();

        $blogCategories = BlogCategory::all();

        $destinationCategories = DestinationCategory::all();

        return view('front.destination.index', compact('destinations', 'selectedCategory', 'destinationCategories', 'kabupatens', 'popularDestinations', 'selectedKabupaten', 'selectedCategory', 'blogCategories'));
    }

    public function show(Destination $destination)
    {
        $accommodations = Accommodation::where('is_share',1)
            ->where('destination_id', $destination->id)
            ->get();

        $testimonies = Testimony::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->where('destination_id', $destination->id)
            ->paginate(6);

        $destinations = Destination::where('id', '!=', $destination->id)
            ->get();

        $closeDestinations = Destination::where('id', '!=', $destination->id)
            ->where('is_share', 1)
            ->where('kabupaten_id', $destination->kabupaten->id)
            ->where('views', 'desc')
            ->get();

        $kabupatens = Kabupaten::get();


        $popularDestinations = Destination::where('id', '!=', $destination->id)
            ->where('is_share', 1)
            ->where('views', 'desc')
            ->get();

        $restaurants = Restaurant::where('is_share', 1)
        ->where('kabupaten_id', $destination->kabupaten->id)
        ->get();

        $destinationCategories = DestinationCategory::all();

        $destination->increment('views');

        $latestBlogs = Blog::where('is_share', 1)
            ->orderBy('created_at', 'desc')
            // ->where('kabupaten_id', $destination->kabupaten->id)
            ->paginate(4);

        $blogCategories = BlogCategory::all();

        return view('front.destination.show', compact(
            'destination', 
            'destinations', 
            'destinationCategories', 
            'closeDestinations', 
            'popularDestinations', 
            'latestBlogs', 
            'testimonies', 
            'kabupatens', 
            'blogCategories',
            'accommodations', 
            'restaurants'
        ));
    }

    public function testimonies(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required',
            'destination_id' => 'required',
            'kabupaten_id' => 'required',
            'contributor_id' => 'required',
        ]);

        // Simpan testimoni ke database
        $testimony = new Testimony;
        $testimony->description = $validatedData['description'];
        // set nilai restaurant_iddestination blog_idestinationnjadi null
        $testimony->blog_id = null;
        $testimony->restaurant_id = null;
        $testimony->status = 0;
        $testimony->destination_id = $validatedData['destination_id'];
        $testimony->kabupaten_id = $validatedData['kabupaten_id'];
        $testimony->contributor_id = $validatedData['contributor_id'];
        $testimony->save();

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function searchDest(Request $request)
    {
        $selectedKabupaten = $request->input('kabupaten');
        $selectedCategory = $request->input('category');
        $output = "";

        $query = Destination::with('galleries')
            ->where('is_share', 1)
            ->orderBy('created_at', 'desc');

        if ($selectedKabupaten != null) {
            $query->where('kabupaten_id', $selectedKabupaten);
        } elseif ($selectedCategory != null) {
            $query->where('category_id', $selectedCategory);
        } elseif ($selectedKabupaten != null && $selectedCategory != null) {
            $query->where('category_id', $selectedCategory)
                ->where('kabupaten_id', $selectedKabupaten);
        }

        $destinations = $query->where(function ($query) use ($request) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('location', 'LIKE', '%' . $search . '%');
        })->get();

        foreach ($destinations as $destination) {
            $output .= '<div class="blog-entry d-flex blog-entry-search-item">
            <a href="' . route('destinations.show', $destination->slug) . '" class="img-link me-4 zoom-image">
                <img src="' . Storage::url(optional($destination->galleries->random())->images) . '"
                    alt="Image" class="img-fluidd">
            </a>
            <div>
                <span class="date">' . $destination->created_at->format('F j, Y') . ' &bullet; <a href="#">' . $destination->destinationCategory->name . '</a></span>
                <h2><a href="' . route('destinations.show', $destination->slug) . '">' . $destination->name . '</a></h2>
                <p>' . Str::limit(strip_tags($destination->description), 150) . '</p>
                <p><a href="' . route('destinations.show', $destination->slug) . '" class="btn btn-sm btn-outline-primary">Baca selengkapnya..</a></p>
            </div>
        </div>';
        }

        return response($output);
    }
}
