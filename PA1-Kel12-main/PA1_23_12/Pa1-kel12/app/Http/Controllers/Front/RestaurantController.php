<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Destination;
use App\Models\DestinationCategory;
use App\Models\Testimony;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $selectedKabupaten = $request->input('kabupaten');

        if ($selectedKabupaten) {

            $restaurants = Restaurant::with('galleries')
                ->where('is_share', 1)
                ->where('kabupaten_id', $selectedKabupaten)
                ->orderBy('created_at', 'desc')
                ->paginate(8);
        } else {

            $restaurants = Restaurant::with('galleries')
                ->where('is_share', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(8);
        }

        $kabupatens = Kabupaten::get();

        $blogCategories = BlogCategory::all();

        $destinationCategories = DestinationCategory::all();

        return view('front.restaurant.index', compact('restaurants', 'kabupatens', 'selectedKabupaten', 'blogCategories', 'destinationCategories'));
    }

    public function show(Restaurant $restaurant)
    {

        $testimonies = Testimony::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->where('restaurant_id', $restaurant->id)
            ->paginate(6);

        $kabupatens = Kabupaten::get();

        $kabupaten = $restaurant->kabupaten->id;

        $destinations = Destination::with('galleries')
            ->where('is_share', 1)
            ->orderBy('created_at', 'desc')
            ->where('kabupaten_id', $kabupaten)
            ->paginate(8);

        $blogs = Blog::with('galleries')
            ->where('is_share', 1)
            ->orderBy('created_at', 'desc')
            ->where('kabupaten_id', $kabupaten)
            ->paginate(8);

        $blogCategories = BlogCategory::all();

        $destinationCategories = DestinationCategory::all();

        return view('front.restaurant.show', compact('restaurant', 'kabupatens', 'destinations', 'blogCategories', 'testimonies', 'destinationCategories', 'blogs'));
    }

    public function testimonies(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required',
            'kabupaten_id' => 'required',
            'restaurant_id' => 'required',
            'contributor_id' => 'required',
        ]);

        // Simpan testimoni ke database
        $testimony = new Testimony;
        $testimony->description = $validatedData['description'];
        // set nilai restaurant_iddestination blog_idestinationnjadi null
        $testimony->blog_id = null;
        $testimony->destination_id = null;
        $testimony->status = 0;
        $testimony->restaurant_id = $validatedData['restaurant_id'];
        $testimony->kabupaten_id = $validatedData['kabupaten_id'];
        $testimony->contributor_id = $validatedData['contributor_id'];
        $testimony->save();

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function searchRest(Request $request)
    {
        $selectedKabupaten = $request->input('kabupaten');
        $output = "";

        $query = Restaurant::with('galleries')
            ->where('is_share', 1)
            ->orderBy('created_at', 'desc');

        if ($selectedKabupaten) {
            $query->where('kabupaten_id', $selectedKabupaten);
        }

        $restaurants = $query->where(function ($query) use ($request) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('location', 'LIKE', '%' . $search . '%');
        })->get();

        foreach ($restaurants as $restaurant) {
            $output .= '
    <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
        <div class="media-entry">
            <a href="' . route('restaurants.show', $restaurant->slug) . '" class="zoom-image">';

            if ($restaurant->galleries->where('category', 'place')->count() > 0) {
                $output .= '
            <img src="' . Storage::url(optional($restaurant->galleries->where('category', 'place')->first())->images) . '"
                alt="Restaurant Image" class="img-fluid gambar">';
            }

            $output .= '
            </a>
            <div class="bg-white m-body">
                <span class="date">' . $restaurant->updated_at->format('F j, Y') . '</span>&mdash;
                <span class="date">' . $restaurant->location . '</span>
                <h3><a href="' . route('restaurants.show', $restaurant->slug) . '">' . $restaurant->name . '</a></h3>
                <p>' . Str::limit(strip_tags($restaurant->description), 50) . '</p>
                <a href="' . route('restaurants.show', $restaurant->slug) . '"
                    class="more d-flex align-items-center float-start">
                    <span class="label">Baca selengkapnya..</span>
                    <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                </a>
            </div>
        </div>
    </div>';
        }

        return response($output);
    }
}
