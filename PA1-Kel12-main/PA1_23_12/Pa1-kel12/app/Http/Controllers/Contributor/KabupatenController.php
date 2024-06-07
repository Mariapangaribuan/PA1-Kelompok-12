<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contributor\KabupatenRequest;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabupatens = Kabupaten::all();

        return view('contributor.kabupaten.index', compact('kabupatens'));
    }
}
