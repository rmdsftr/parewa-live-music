<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'fullname.required' => 'nama wajib diisi',
            'email.required' => 'email wajib diisi',
            'email.email' => 'email tidak valid',
            'password.required' => 'password wajib diisi',
            'password.min' => 'password minimal 6 karakter'
        ]);

        $data = [
            'name' => $request->input('fullname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ];

        User::create($data);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            return redirect('/');
        } else {
            return redirect('/login')->withErrors(['email' => 'Email atau password salah']);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'email wajib diisi',
            'email.email' => 'email tidak valid',
            'email.exists' => 'Email belum terdaftar',
            'password.required' => 'password wajib diisi',
            'password.min' => 'password minimal 6 karakter'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($data)){
            $userId = Auth::id();
            if($request->input('email') == 'admin@parewa.com'){
                return redirect('/admin');
            } else{
                $isBand = DB::table('band')->where('id', $userId)->exists();

                if ($isBand) {
                    return redirect('/grup');
                } else{
                    return redirect('/');
                }
                
            }
        } else {
            return redirect('/login')->withErrors(['email' => 'Email atau password salah']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function edituser(Request $request){
        $userId = Auth::id();

        DB::table('users')->where('id', '=', $userId)
            ->update([
                'name' => $request->input('nama'),
                'email' => $request->input('email')
            ]);

        return redirect('/grup');
    }

    public function editband(Request $request){
        $userId = Auth::id();

        DB::table('band')->where('band_id', '=', $userId)
            ->update([
                'nama_band' => $request->input('nama_band'),
                'genre' => $request->input('genre')
            ]);

        return redirect('/grup');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect'])->withInput();
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully');
    }
}
