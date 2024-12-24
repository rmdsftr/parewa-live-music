<?php

namespace App\Http\Controllers;

use App\Models\band;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Pail\File;

class ProfileController extends Controller
{
    // public function show()
    // {
    //     $user = Auth::user();
    //     $band = band::where('user_id', $user->id)->first(); 
    //     return view('profile.edit', compact('user', 'band'));
    // }

    // public function update(Request $request, $userId)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:users,email,' . $userId,
    //         'band_name' => 'required|string|max:255',
    //         'genre' => 'required|string|max:255',
    //         'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    //         'band_photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    //     ]);

    //     $user = User::findOrFail($userId);
    //     $band = Band::where('user_id', $userId)->firstOrFail();

    //     $user->name = $validated['name'];
    //     $user->email = $validated['email'];

    //     if ($request->hasFile('photo')) {
    //         if ($user->photo && File::exists(public_path('uploads/users/photos/' . $user->photo))) {
    //             File::delete(public_path('uploads/users/photos/' . $user->photo));
    //         }

    //         $photoName = time() . '.' . $request->photo->getClientOriginalExtension();
    //         $request->photo->move(public_path('uploads/users/photos'), $photoName);
    //         $user->photo = $photoName;
    //     }

    //     $band->band_name = $validated['band_name'];
    //     $band->genre = $validated['genre'];

    //     if ($request->hasFile('band_photo')) {
    //         if ($band->photo && File::exists(public_path('uploads/bands/photos/' . $band->photo))) {
    //             File::delete(public_path('uploads/bands/photos/' . $band->photo));
    //         }
    //         $bandPhotoName = time() . '.' . $request->band_photo->getClientOriginalExtension();
    //         $request->band_photo->move(public_path('uploads/bands/photos'), $bandPhotoName);
    //         $band->photo = $bandPhotoName;
    //     }

    //     $user->save();
    //     $band->save();

    //     return redirect()->route('profile.edit')->with('success', 'Profile and Band updated successfully.');
    // }

    
    // public function changePassword(Request $request, $userId)
    // {
    //     $user = User::findOrFail($userId);
    //     $validated = $request->validate([
    //         'current_password' => 'required',
    //         'new_password' => 'required|min:8|confirmed',
    //     ]);

    //     if (!Hash::check($validated['current_password'], $user->password)) {
    //         return redirect()->back()->with('error', 'Current password is incorrect.');
    //     }

    //     $user->password = Hash::make($validated['new_password']);
    //     $user->save();

    //     return redirect()->route('profile.edit')->with('success', 'Password changed successfully.');
    // }
}
