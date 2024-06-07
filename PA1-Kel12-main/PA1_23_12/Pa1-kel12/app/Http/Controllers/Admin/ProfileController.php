<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\Admin;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('admin.auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->guard('admin')->user();

        if ($request->password) {
            auth()->guard('admin')->user()->update(['password' => Hash::make($request->password)]);
        }

        if ($request->hasFile('image')) {
            // Menghapus gambar profil sebelumnya jika ada
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            // Mengunggah dan menyimpan gambar profil yang baru
            $imagePath = $request->file('image')->store('profile/gallery', 'public');
            $user->image = $imagePath;
            
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->age = $request->age;
        $user->address = $request->address;
        $user->save();

        return redirect()->back()->with([
            'message' => 'Profile berhasil diupdate!',
            'alert-type' => 'success'
        ]);
    }
}
