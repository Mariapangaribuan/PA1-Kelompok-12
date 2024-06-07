<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Tambahkan baris ini
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Testimony;
use App\Models\Destination;
use App\Models\DestinationCategory;
use App\Models\Kabupaten;
use App\Models\Restaurant;

class HomeController extends Controller
{
    public function welcome()
    {
        $destinations = Destination::with('galleries')
            ->where('is_share', 1)
            ->orderBy('views', 'desc')
            ->get();

        $blogs = Blog::with('galleries')
            ->where('is_share', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        $testimonies = Testimony::where('status',1)
            ->get();
            
        $kabupatens = Kabupaten::get();
        $destinationCategories = DestinationCategory::get();
        $blogCategories = BlogCategory::get();

        return view('front.welcome', compact('destinations', 'blogs', 'testimonies', 'kabupatens', 'destinationCategories', 'blogCategories'));
    }

    public function kabupatens(Request $request, Kabupaten $kabupaten)
    {
        $selectedKabupaten = $kabupaten->id;

        $blogCategories = BlogCategory::get();

        $destinations = Destination::with('galleries')
            ->where('kabupaten_id', $selectedKabupaten)
            ->where('is_share', 1)
            ->orderBy('views', 'desc')
            ->get();

        $blogs = Blog::with('galleries')
            ->where('kabupaten_id', $selectedKabupaten)
            ->where('is_share', 1)
            ->orderBy('views', 'desc')
            ->get();

        $restaurants = Restaurant::with('galleries')
            ->where('kabupaten_id', $selectedKabupaten)
            ->where('is_share', 1)
            // ->orderBy('views', 'desc')
            ->get();

        $kabupatens = Kabupaten::get();

        $destinationCategories = DestinationCategory::all();

        return view('front.kabupaten.index', compact('destinations', 'blogs', 'kabupatens', 'kabupaten', 'restaurants', 'blogCategories', 'destinationCategories'));
    }

    public function search(Request $request)
    {
        $cariApa = $request->input('cariApa');
        $kemana = $request->input('kemana');
        $kategori = $request->input('kategori');

        
        // Lakukan logika pencarian atau tindakan lainnya

        if($cariApa != null && $kemana == null && $kategori == null){

            return redirect()->route($cariApa .'.index');

        }else if($cariApa != null && $kemana == null && $kategori != null){

            return redirect()->route( $cariApa.'.index', ['category' => $kategori ]);

        } else if($cariApa != null && $kemana != null && $kategori == null){

            return redirect()->route( $cariApa.'.index', ['kabupaten' => $kemana ]);

        }else if($cariApa == null && $kemana != null && $kategori == null){

            return redirect()->route('kabupatens', $kemana);

        } 
        else if($cariApa != null && $kemana != null && $kategori != null){

            return redirect()->route( $cariApa.'.index', ['category' => $kategori , 'kabupaten' => $kemana]);
        } 
        else if ($cariApa == null && $kemana == null && $kategori == null) {
            
            return redirect()->back();

        } 
    }

    public function tentangkami()
    {
        $kabupatens = Kabupaten::get();

        $blogCategories = BlogCategory::all();

        $destinationCategories = DestinationCategory::all();

        return view('front.tentangkami', compact('kabupatens', 'blogCategories', 'destinationCategories'));
    }
}
