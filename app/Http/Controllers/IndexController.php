<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function show(){
        $today = Carbon::today();

        $jadwal = DB::table('jadwal_band')
            ->where('tanggal', '=', $today)->first();

        if(!$jadwal){
            return view('user/index')->with([
                'error' => 'There is no performance today',
                'performance' => null,
                'band' => null
            ]);
        } else{
            $performance = DB::table('jadwal_band')
                ->where('band_id', '=', $jadwal->band_id)
                ->where('tanggal', '=', $today)
                ->first();
            
            $band = DB::table('band')
                ->where('band_id', '=', $performance->band_id)
                ->first();

            $performance->tanggal = Carbon::parse($performance->tanggal);

            return view('user/index', compact('performance', 'band'));
        }
    }

    public function bandHome(){
        $today = Carbon::today();

        $jadwal = DB::table('jadwal_band')
            ->where('tanggal', '=', $today)->first();

        if(!$jadwal){
            return view('band/index')->with([
                'error' => 'There is no performance today',
                'performance' => null,
                'band' => null
            ]);
        } else{
            $performance = DB::table('jadwal_band')
                ->where('band_id', '=', $jadwal->band_id)
                ->where('tanggal', '=', $today)
                ->first();
            
            $band = DB::table('band')
                ->where('band_id', '=', $performance->band_id)
                ->first();

            $performance->tanggal = Carbon::parse($performance->tanggal);

            return view('band/index', compact('performance', 'band'));
        }
    }

    public function adminHome(){
        $today = Carbon::today();

        $jadwal = DB::table('jadwal_band')
            ->where('tanggal', '=', $today)->first();

        if(!$jadwal){
            return view('admin/index')->with([
                'error' => 'There is no performance today',
                'performance' => null,
                'band' => null
            ]);
        } else{
            $performance = DB::table('jadwal_band')
                ->where('band_id', '=', $jadwal->band_id)
                ->where('tanggal', '=', $today)
                ->first();
            
            $band = DB::table('band')
                ->where('band_id', '=', $performance->band_id)
                ->first();
            
            $performance->tanggal = Carbon::parse($performance->tanggal);
            return view('admin/index', compact('performance', 'band'));
        }
    }

    public function bandProfil(){
        $userId = Auth::id();

        $data_band = DB::table('band')
            ->where('band_id', '=', $userId)->first();

        $data_user = DB::table('users')
            ->where('id', '=', $userId)->first();

        return view('band/profil', compact('data_band', 'data_user'));
    }

}
