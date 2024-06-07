<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Destination;
use Illuminate\Support\Str;
use App\Models\DestinationCategory;
use App\Models\Kabupaten;
use App\Models\Testimony;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $kabupatens = Kabupaten::get();
        $selectedCategory = $request->input('category');
        $selectedKabupaten = $request->input('kabupaten');

        if ($selectedCategory != null && $selectedKabupaten == null) {
            $blogs = Blog::with('galleries')
                ->where('blog_category_id', $selectedCategory)
                ->where('is_share', 1)
                ->paginate(5);
        } else if ($selectedCategory == null && $selectedKabupaten != null) {
            $blogs = Blog::with('galleries')
                ->where('kabupaten_id', $selectedKabupaten)
                ->where('is_share', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        } else if ($selectedCategory != null  && $selectedKabupaten != null) {

            $blogs = Blog::with('galleries')
                ->where('blog_category_id', $selectedCategory)
                ->where('kabupaten_id', $selectedKabupaten)
                ->orderBy('created_at', 'desc')
                ->where('is_share', 1)
                ->paginate(5);
        } else {
            $blogs = Blog::with('galleries')
                ->where('is_share', 1)
                ->paginate(5);
        }

        $latestBlogs = Blog::where('is_share', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        $popularBlogs = Blog::with('galleries')
            ->where('is_share', 1)
            ->orderBy('views', 'desc') // Order by views in descending order
            ->get();

        $destinations = Destination::where('is_share', 1)
            ->get();

        $blogCategories = BlogCategory::all();

        $destinationCategories = DestinationCategory::all();

        return view('front.blog.index', compact('blogs', 'latestBlogs', 'destinations', 'popularBlogs', 'blogCategories', 'selectedCategory', 'kabupatens', 'selectedKabupaten', 'destinationCategories'));
    }

    public function show(Blog $blog)
    {
        $testimonies = Testimony::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->where('blog_id', $blog->id)
            ->paginate(6);


        $latestBlogs = Blog::where('is_share', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(7);

        $popularBlogs = Blog::with('galleries')
            ->where('is_share', 1)
            ->orderBy('views', 'desc') // Order by views in descending order
            ->paginate(7);

        $destinations = Destination::where('is_share', 1)
            ->paginate(7);

        $blogCategories = BlogCategory::all();

        $blog->increment('views');

        $kabupatens = Kabupaten::get();

        $destinationCategories = DestinationCategory::get();

        return view('front.blog.show', compact('blog', 'latestBlogs', 'destinations', 'popularBlogs', 'blogCategories', 'testimonies', 'kabupatens', 'destinationCategories'));
    }

    public function testimonies(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required',
            'blog_id' => 'required',
            'kabupaten_id' => 'required',
            'contributor_id' => 'required',
        ]);

        // Simpan testimoni ke database
        $testimony = new Testimony;
        $testimony->description = $validatedData['description'];
        // set nilai restaurant_id dan blog_id menjadi null
        $testimony->destination_id = null;
        $testimony->restaurant_id = null;
        $testimony->status = 0;
        $testimony->blog_id = $validatedData['blog_id'];
        $testimony->kabupaten_id = $validatedData['kabupaten_id'];
        $testimony->contributor_id = $validatedData['contributor_id'];
        $testimony->save();

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function searchBlog(Request $request)
    {

        $selectedKabupaten = $request->input('kabupaten');
        $selectedCategory = $request->input('category');
        $output = "";

        $query = Blog::with('galleries')
            ->where('is_share', 1)
            ->orderBy('created_at', 'desc');

        if ($selectedKabupaten != null) {
            $query->where('kabupaten_id', $selectedKabupaten);
        } elseif ($selectedCategory != null) {
            $query->where('category_id', $selectedCategory);
        } elseif ($selectedKabupaten != null && $selectedCategory != null) {
            $query->where('category_id', $selectedCategory)
                ->where('kabupaten_id', $selectedKabupaten);
        }

        $blogs = $query->where(function ($query) use ($request) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%');
        })->get();


        foreach ($blogs as $blog) {
            $output .= '<div class="d-md-flex post-entry-2 half">
                <a href="' . route('blogs.show', $blog->slug) . '" class="me-4 thumbnail zoom-image">
            <img src="' . Storage::url(optional($blog->galleries->random())->images) . '" alt="" class="img-fluid">
        </a>
        <div>
            <div class="post-meta"><span class="date">';
            if ($blog->blogCategory) {
                $output .= $blog->blogCategory->name;
            }
            $output .= '</span><span class="mx-1">•</span>
            <span>' . $blog->updated_at->format('F j, Y') . '</span>
        </div>
        <h3><a href="' . route('blogs.show', $blog->slug) . '">' . $blog->title . '</a></h3>
        <p>' . $blog->excerpt . '</p>
        <div class="d-flex align-items-center author">
            <div class="photo"><img src="';
            if ($blog->contributor) {
                $output .= Storage::url($blog->contributor->image);
            } else {
                $output .= asset('Template/dist/img/profile.jpeg');
            }
            $output .= '" alt="" class="img-fluid"></div>
            <div class="name">
                <h3 class="m-0 p-0">';
            if ($blog->contributor) {
                $output .= $blog->contributor->name;
            } elseif ($blog->contributor_id == null) {
                $output .= 'Admin';
            }
            $output .= '</h3>
            </div>
        </div>
    </div>
                    </div>
    </div>';
        }
        return response($output);
    }
}
