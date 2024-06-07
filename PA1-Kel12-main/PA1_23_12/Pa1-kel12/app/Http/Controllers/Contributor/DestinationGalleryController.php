<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\DestinationGallery;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Contributor\DestinationGalleryRequest;

class DestinationGalleryController extends Controller
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
    public function store(DestinationGalleryRequest $request, Destination $destination)
    {
        if ($request->validated()) {
            $images = $request->file('images')->store(
                'destination/gallery',
                'public'
            );
            DestinationGallery::create($request->except('images') + ['images' => $images, 'destination_id' => $destination->id]);
        }

        return redirect()->route('contributor.destination.edit', [$destination])->with([
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
    public function edit(Destination $destination, DestinationGallery $gallery)
    {
        return view('contributor.destinationGalleries.edit', compact('destination', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DestinationGalleryRequest $request, Destination $destination, DestinationGallery $gallery)
    {
        if ($request->validated()) {
            if ($request->images) {
                File::delete('storage/' . $gallery->images);
                $images = $request->file('images')->store(
                    'blog/gallery',
                    'public'
                );
                $gallery->update($request->except('images') + ['images' => $images, 'destination_id' => $destination->id]);
            } else {
                $gallery->update($request->validated());
            }
        }

        return redirect()->route('contributor.destination.edit', [$destination])->with([
            'message' => 'Success Updated !',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination, DestinationGallery $gallery)
    {
        File::delete('storage/'. $gallery->images);
        $gallery->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
