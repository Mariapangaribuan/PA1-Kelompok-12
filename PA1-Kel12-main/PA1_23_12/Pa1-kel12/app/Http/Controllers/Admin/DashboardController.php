<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use App\Models\DestinationCategory;
use App\Models\Destination;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\Contributor;
use App\Models\Kabupaten;
use App\Models\Restaurant;
use App\Models\Testimony;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // $nama_admin = User::all();

        $sumKabupaten  = Kabupaten::count();
        $sumDestinationCategory  = DestinationCategory::count();
        $sumDestination  = Destination::count();
        $sumBlogCategory = BlogCategory::count();
        $sumBlog = Blog::count();
        $sumRestaurant = Restaurant::count();
        $sumContributor = Contributor::count();
        $sumAccommodation = Accommodation::count();

        return view('admin.dashboard', compact(
            'sumKabupaten',
            'sumDestinationCategory',
            'sumBlogCategory',
            'sumBlog',
            'sumDestination',
            'sumRestaurant',
            'sumContributor',
            'sumAccommodation',
        ));
    }

    public function contributors()
    {
        $contributors = Contributor::get();
        return view('admin.contributor', compact('contributors'));
    }

    public function updateStatus(Request $request, $id)
    {
        $contributor = Contributor::find($id);

        if ($contributor['status'] == 1) {
            $contributor['status'] = 0;
        }else {
            $contributor['status'] = 1;
        }
        $contributor->save();

        return redirect()->back()->with('message', $contributor['name'] . 'Status Penggunna Berhasil Diganti!');
    }

    public function deleteTestimony($id)
    {
        $testimony = Testimony::find($id);
        $testimony->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function testimonies()
    {
        $testimonies = Testimony::get();
        return view('admin.testimony', compact('testimonies'));
    }

    public function updateTestimony($id){

        $testimony = Testimony::find($id);

        if ($testimony['status'] == 1) {
            $testimony['status'] = 0;
        }else {
            $testimony['status'] = 1;
        }
        $testimony->save();

        return redirect()->back()->with('message', 'Status testimony Berhasil Diganti');
        
    }
}
