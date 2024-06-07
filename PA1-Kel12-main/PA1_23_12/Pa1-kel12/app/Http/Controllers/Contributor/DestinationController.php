<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Support\Str;
use App\Models\DestinationCategory;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use App\Models\DestinationGallery;
use App\Http\Requests\Contributor\DestinationRequest;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contributor = Auth::guard('contributor')->id();
        $destinations = Destination::with('DestinationCategory')
                                    ->where('contributor_id', $contributor)
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        return view('contributor.destination.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinationCategories = DestinationCategory::all();
        $kabupatens = Kabupaten::all();
        return view('contributor.destination.create', compact('destinationCategories', 'kabupatens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DestinationRequest $request)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->name, '-') . time();
            $contributor = Auth::guard('contributor')->user()->id;
            $destination = Destination::create($request->validated() + ['slug' => $slug] + ['contributor_id' => $contributor]);
        }

        return redirect()->route('contributor.destination.edit', [$destination])->with([
            'message' => 'Destinasi baru berhasil ditambahkan!',
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
    public function edit(Destination $destination)
    {

        $contributorId = Auth::guard('contributor')->id();

        if ($destination->contributor_id !== $contributorId) {
            return redirect()->back();
        }

        $destinationGalleries = DestinationGallery::paginate(10);
        $destinationCategories = DestinationCategory::all();
        $kabupatens = Kabupaten::all();

        return view('contributor.destination.edit', compact('destinationGalleries', 'destination', 'destinationCategories', 'kabupatens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DestinationRequest $request, Destination $destination)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->location, '-'). time();
            $contributor = Auth::guard('contributor')->user()->id;
            $destination->update($request->validated() + ['slug' => $slug] + ['contributor_id' => $contributor]);
        }

        return redirect()->route('contributor.destination.index')->with([
            'message' => 'Destinasi berhasil diupdate!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
