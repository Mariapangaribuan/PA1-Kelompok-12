<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KabupatenRequest;
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

        return view('admin.kabupaten.index', compact('kabupatens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kabupaten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KabupatenRequest $request)
    {
        if ($request->validated()) {
            $logo = $request->file('logo')->store(
                'kabupaten/logo',
                'public'
            );
            $slug = Str::slug($request->name, '-') . '-' . time();

            Kabupaten::create($request->except('logo') + ['slug' => $slug, 'logo' => $logo]);
        }

        // kembalikan ke halaman index dan tampilkan pesan berhasil
        return redirect()->route('admin.kabupaten.index')->with([
            'message' => 'Kabupaten baru berhasil ditambahkan!!',
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
    public function edit(Kabupaten $kabupaten)
    {
        return view('admin.kabupaten.edit', compact('kabupaten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KabupatenRequest $request, Kabupaten $kabupaten)
    {
        if ($request->validated()) {
            $slug = Str::slug($request->name, '-');
            if ($request->logo) {
                File::delete('storage' . $kabupaten->logo);
                $logo = $request->file('logo')->store(
                    'kabupaten/logo',
                    'public'
                );
                $kabupaten->update($request->except('logo') + ['slug' => $slug, 'logo' => $logo]);
            } else {
                $kabupaten->update($request->validated() + ['slug' => $slug]);
            }
        }
        return redirect()->route('admin.kabupaten.index')->with([
            'message' => 'Data kabupaten berhasil diupdate!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabupaten $kabupaten)
    {
        File::delete('storage/' . $kabupaten->logo);
        $kabupaten->delete();

        return redirect()->back()->with([
            'message' => 'Kabupaten berhasil di Hapus !',
            'alert-type' => 'danger'
        ]);
    }
}
