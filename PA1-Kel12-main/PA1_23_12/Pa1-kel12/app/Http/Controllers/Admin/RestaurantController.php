<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\RestaurantRequest;
use App\Models\Kabupaten;
use App\Models\RestaurantGallery;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::with('kabupaten')
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('admin.restaurant.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabupatens = Kabupaten::get(['name', 'id']);
        return view('admin.restaurant.create', compact('kabupatens'));
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
            $restaurant = Restaurant::create($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.restaurant.edit', [$restaurant])->with([
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
        $restaurantGalleries = RestaurantGallery::paginate(10);
        $kabupatens = Kabupaten::get(['name', 'id']);
        return view('admin.restaurant.edit', compact('restaurantGalleries','restaurant', 'kabupatens'));
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
            $restaurant->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.restaurant.index')->with([
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

    public function updateStatus(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);

        if ($restaurant['is_share'] == 1) {
            $restaurant['is_share'] = 0;
            $message = $restaurant->name . ' Restaurant tidak akan ditampilkan.';
        }else {
            $restaurant['is_share'] = 1;
            $message = $restaurant->name . ' Restaurant akan ditampilkan.';
        }
        $restaurant->save();

        return redirect()->back()->with('message', $message);
    }
}
