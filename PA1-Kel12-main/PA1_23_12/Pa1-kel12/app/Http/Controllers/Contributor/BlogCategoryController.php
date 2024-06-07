<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use App\Http\Requests\Contributor\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil semua data dari tabel blog_kategori
        $blogCategories = BlogCategory::all();
        // mengembalikan data ke halaman index
        return view('contributor.blogCategories.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // mengembalikan halaman create
        return view('contributor.blogCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryRequest $request)
    {
        //validation data
        if ($request->validated()) {
            $slug = Str::slug($request->name . '-');
            BlogCategory::create($request->validated() + ['slug' => $slug]);
        }

        // return to index 
        return redirect()->route('contributor.blogCategory.index')->with([
            'message' => 'Kategori Blog baru berhasil ditambahkan',
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
    public function edit(BlogCategory $blogCategory)
    {
        // Kirim data blog_kategori ke view edit.blade.php
        return view('contributor.blogCategories.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->name, '-');
            $blogCategory->update($request->validated() + ['slug' => $slug]);
        }
        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('contributor.blogCategory.index')->with(
            [
                'message' => 'Kategori Blog berhasil diupdate',
                'alert-type' => 'success'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogCategory $blogCategory)
    {
        $blogCategory->delete();

        return redirect()->back()->with([
            'message' => 'Success Delete!',
            'alert-type' => 'danger'
        ]);
    }
}
