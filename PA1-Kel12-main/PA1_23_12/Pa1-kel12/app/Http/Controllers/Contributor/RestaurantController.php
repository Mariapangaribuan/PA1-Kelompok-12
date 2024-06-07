<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Contributor\RestaurantRequest;
use App\Models\Kabupaten;
use App\Models\RestaurantGallery;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contributor = Auth::guard('contributor')->id();
        $restaurants = Restaurant::with('kabupaten')
        ->orderBy('created_at', 'desc')
        ->where('contributor_id', $contributor)
                                                ->paginate(10);
        
        return view('contributor.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabupatens = Kabupaten::get(['name', 'id']);
        return view('contributor.restaurant.create', compact('kabupatens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->location, '-');
            $contributor = Auth::guard('contributor')->user()->id;
            $restaurant = Restaurant::create($request->validated() + ['slug' => $slug] + ['contributor_id' => $contributor]);
        }

        return redirect()->route('contributor.restaurant.edit', [$restaurant])->with([
            'message' => 'Tempat Makan baru Berhasil Ditambahkan!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $contributorId = Auth::guard('contributor')->id();

        if ($restaurant->contributor_id !== $contributorId) {
            return redirect()->back();
        }

        $restaurantGalleries = RestaurantGallery::paginate(10);
        $kabupatens = Kabupaten::get(['name', 'id']);
        return view('contributor.restaurant.edit', compact('restaurantGalleries','restaurant', 'kabupatens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->location, '-'). time();
            $contributor = Auth::guard('contributor')->user()->id;
            $restaurant->update($request->validated() + ['slug' => $slug] + ['contributor_id' => $contributor]);
        }

        return redirect()->route('contributor.restaurant.index')->with([
            'message' => 'Data Tempat Makan Berhasil Diupdate!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
