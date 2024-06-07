<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use App\Models\DestinationCategory;
use App\Models\Destination;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\Kabupaten;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $contributor = Auth::guard('contributor')->id();

        $sumKabupaten  = Kabupaten::count();

        $sumDestination  = Destination::where('contributor_id', $contributor)
        ->count();
        $sumBlog = Blog::where('contributor_id', $contributor)
        ->count();
        $sumRestaurant = Restaurant::where('contributor_id', $contributor)
        ->count();
        $sumAccommodation = Accommodation::where('contributor_id', $contributor)
        ->count();

        return view('contributor.dashboard', compact(
            'sumKabupaten',
            'sumBlog',
            'sumDestination',
            'sumRestaurant',
            'sumAccommodation',
        ));
    }
}
