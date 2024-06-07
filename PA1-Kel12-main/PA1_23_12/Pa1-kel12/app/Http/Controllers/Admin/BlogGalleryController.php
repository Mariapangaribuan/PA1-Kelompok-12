<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BlogGalleryRequest;
use App\Http\Requests\Admin\GalleryRequest;
use Illuminate\Support\Facades\File;
use App\Models\Blog;
use App\Models\BlogGallery;

class BlogGalleryController extends Controller
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
    public function store(BlogGalleryRequest $request, Blog $blog)
    {
        if ($request->validated()) {
            $images = $request->file('images')->store(
                'blog/gallery',
                'public'
            );
            BlogGallery::create($request->except('images') + ['images' => $images, 'blog_id' => $blog->id]);
        }

        return redirect()->route('admin.blog.edit', [$blog])->with([
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
    public function edit(Blog $blog, BlogGallery $gallery)
    {
        return view('admin.blogGalleries.edit', compact('blog', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogGalleryRequest $request, Blog $blog, BlogGallery $gallery)
    {
        if ($request->validated()) {
            if ($request->images) {
                File::delete('storage/' . $gallery->images);
                $images = $request->file('images')->store(
                    'blog/gallery',
                    'public'
                );
                $gallery->update($request->except('images') + ['images' => $images, 'blog_id' => $blog->id]);
            } else {
                $gallery->update($request->validated());
            }
        }

        return redirect()->route('blog.edit', [$blog])->with([
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
    public function destroy(Blog $blog, BlogGallery $gallery)
    {
        File::delete('storage/' . $gallery->images);
        $gallery->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
