<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\BlogGallery;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('BlogCategory')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::all();
        $kabupatens = Kabupaten::all();
        return view('admin.blog.create', compact('categories', 'kabupatens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        if ($request->validated()) {
            // $request['contributor_id'] = Auth::guard('contributor')->user()->id;
            $slug = Str::slug($request->title, '-') . '-' . time();
            $blog = Blog::create($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.blog.edit', [$blog])->with([
            'message' => 'Blog baru berhasil ditambahkan!',
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
    public function edit(Blog $blog)
    {
        $kabupatens = Kabupaten::all();
        $categories = BlogCategory::get(['name', 'id']);
        $blogGalleries = BlogGallery::paginate(10);

        return view('admin.blog.edit', compact('blog', 'categories', 'blogGalleries', 'kabupatens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->title, '-');
            $blog->update($request->validated() + ['slug' => $slug]);
        }
        return redirect()->route('admin.blog.index')->with([
            'message' => 'Blog berhasil diupdate!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->back()->with([
            'message' => 'Success Deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $blog = Blog::find($id);

        if ($blog['is_share'] == 1) {
            $blog['is_share'] = 0;
            $message = $blog->name . ' Restaurant tidak akan ditampilkan.';
        }else {
            $blog['is_share'] = 1;
            $message = $blog->name . ' Restaurant akan ditampilkan.';
        }
        $blog->save();

        return redirect()->back()->with('message', $message);
    }
}
