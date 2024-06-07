<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use App\Models\DestinationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Contributor\DestinationCategoryRequest;

class DestinationCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil semua data dari tabel destinasiCategories
        $destinationCategories = DestinationCategory::all();
        // mengembalikan data ke halaman index
        return view('contributor.destinationCategories.index', compact('destinationCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // mengarahkan ke halaman create kategori destinasi
        return view('contributor.destinationCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DestinationCategoryRequest $request)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->name . '-');
            DestinationCategory::create($request->validated() + ['slug' => $slug]);
        }

        // kembalikan ke halaman index dan tampilkan pesan berhasil
        return redirect()->route('contributor.destinationCategory.index')->with([
            'message' => 'Kategori Destinasi baru berhasil ditambahkan!',
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
    public function edit(DestinationCategory $destinationCategory)
    {
        // Kirim data destinasi_kategori ke view edit.blade.php
        return view('contributor.destinationCategories.edit', compact('destinationCategory')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DestinationCategoryRequest $request, DestinationCategory $destinationCategory)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->name, '-');
            $destinationCategory->update($request->validated() + ['slug' => $slug]);
        }
        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('contributor.destinationCategory.index')->with('success', 'Destination category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestinationCategory $destinationCategory)
    {
        $destinationCategory->delete();

        return redirect()->back()->with([
            'message' => 'Destination Category Success Delete !',
            'alert-type' => 'danger'
        ]);
    }
}
