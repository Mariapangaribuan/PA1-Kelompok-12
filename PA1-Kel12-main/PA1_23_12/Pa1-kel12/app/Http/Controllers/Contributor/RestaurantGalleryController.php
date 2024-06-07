<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\RestaurantGallery;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Contributor\RestaurantGalleryRequest;

class RestaurantGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantGalleryRequest $request, Restaurant $restaurant)
    {
        if ($request->validated()) {
            $images = $request->file('images')->store(
                'restaurant/gallery',
                'public'
            );
            RestaurantGallery::create($request->except('images') + ['images' => $images, 'restaurant_id' => $restaurant->id]);
        }

        return redirect()->route('contributor.restaurant.edit', [$restaurant])->with([
            'message' => 'Data berhasil ditambahkan!',
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, RestaurantGallery $gallery)
    {
        File::delete('storage/' . $gallery->images);
        $gallery->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted!',
            'alert-type' => 'danger'
        ]);
    }
}
