<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function show(){
        $today = Carbon::today();
    
        $scheduleDay1 = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->whereDate('jadwal_band.tanggal', '=', $today->copy()->addDay()->format('Y-m-d'))  // Menggunakan format tanggal yang sesuai
            ->whereIn('jadwal_band.status_jadwal', ['accepted', 'admin_accepted'])
            ->select('jadwal_band.tanggal', 'band.nama_band', 'band.genre', 'band.foto_band')
            ->first();  
    
        $scheduleDay2 = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->whereDate('jadwal_band.tanggal', '=', $today->copy()->addDays(2)->format('Y-m-d'))  // Menggunakan format tanggal yang sesuai
            ->whereIn('jadwal_band.status_jadwal', ['accepted', 'admin_accepted'])
            ->select('jadwal_band.tanggal', 'band.nama_band', 'band.genre', 'band.foto_band')
            ->first();  
    
        $scheduleDay3 = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->whereDate('jadwal_band.tanggal', '=', $today->copy()->addDays(3)->format('Y-m-d'))  // Menggunakan format tanggal yang sesuai
            ->whereIn('jadwal_band.status_jadwal', ['accepted', 'admin_accepted'])
            ->select('jadwal_band.tanggal', 'band.nama_band', 'band.genre', 'band.foto_band')
            ->first(); 
            
    
        return view('user/schedule', compact('scheduleDay1', 'scheduleDay2', 'scheduleDay3'));
    }

    public function scheduleShow(){
        return view('admin/schedule');
    }

    public function index()
    {
        $today = Carbon::today();
        
        $scheduleDay1 = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->whereDate('jadwal_band.tanggal', '=', $today->copy()->addDay()->format('Y-m-d'))  // Menggunakan format tanggal yang sesuai
            ->whereIn('jadwal_band.status_jadwal', ['accepted', 'admin_accepted'])
            ->select('jadwal_band.tanggal', 'band.nama_band', 'band.genre', 'band.foto_band', 'band.band_id')
            ->first();  
    
        $scheduleDay2 = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->whereDate('jadwal_band.tanggal', '=', $today->copy()->addDays(2)->format('Y-m-d'))  // Menggunakan format tanggal yang sesuai
            ->whereIn('jadwal_band.status_jadwal', ['accepted', 'admin_accepted'])
            ->select('jadwal_band.tanggal', 'band.nama_band', 'band.genre', 'band.foto_band', 'band.band_id')
            ->first();  
    
        $scheduleDay3 = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->whereDate('jadwal_band.tanggal', '=', $today->copy()->addDays(3)->format('Y-m-d'))  // Menggunakan format tanggal yang sesuai
            ->whereIn('jadwal_band.status_jadwal', ['accepted', 'admin_accepted'])
            ->select('jadwal_band.tanggal', 'band.nama_band', 'band.genre', 'band.foto_band', 'band.band_id')
            ->first(); 
        
        $bands = DB::table('band')->get();    
        
        $requestedSchedule = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->where('jadwal_band.status_jadwal', '=', 'requested')
            ->select('jadwal_band.*', 'band.*')
            ->get();

        $historySchedule = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->where('jadwal_band.status_jadwal', '=', 'Performance Successfull')
            ->select('jadwal_band.*', 'band.*')
            ->get();

        return view('admin/schedule', compact('scheduleDay1', 'scheduleDay2', 'scheduleDay3', 'bands', 'requestedSchedule', 'historySchedule'));  
    }
    
    public function storeSchedule(Request $request)
    {
        DB::table('jadwal_band')->insert([
            'band_id' => $request->band,
            'tanggal' => $request->tanggal,
            'status_jadwal' => 'sent',
        ]);

        return redirect()->back()->with('success', 'Schedule added successfully!');
    }

    public function scheduleBand(){
        $today = Carbon::today();
    
        $scheduleDay1 = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->whereDate('jadwal_band.tanggal', '=', $today->copy()->addDay()->format('Y-m-d'))  // Menggunakan format tanggal yang sesuai
            ->whereIn('jadwal_band.status_jadwal', ['accepted', 'admin_accepted'])
            ->select('jadwal_band.tanggal', 'band.nama_band', 'band.genre', 'band.foto_band')
            ->first();  
    
        $scheduleDay2 = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->whereDate('jadwal_band.tanggal', '=', $today->copy()->addDays(2)->format('Y-m-d'))  // Menggunakan format tanggal yang sesuai
            ->whereIn('jadwal_band.status_jadwal', ['accepted', 'admin_accepted'])
            ->select('jadwal_band.tanggal', 'band.nama_band', 'band.genre', 'band.foto_band')
            ->first();  
    
        $scheduleDay3 = DB::table('jadwal_band')
            ->join('band', 'jadwal_band.band_id', '=', 'band.id')
            ->whereDate('jadwal_band.tanggal', '=', $today->copy()->addDays(3)->format('Y-m-d'))  // Menggunakan format tanggal yang sesuai
            ->whereIn('jadwal_band.status_jadwal', ['accepted', 'admin_accepted'])
            ->select('jadwal_band.tanggal', 'band.nama_band', 'band.genre', 'band.foto_band')
            ->first(); 
            
        $userId = Auth::id();

        $tampil = DB::table('jadwal_band')
            ->where('band_id', '=', $userId)
            ->where('status_jadwal', '=', 'sent')
            ->first();
        
        $ajukan = DB::table('jadwal_band')
            ->where('band_id', '=', $userId)
            ->where('status_jadwal', '=', 'requested')
            ->first();
    
        return view('band/schedule', compact('scheduleDay1', 'scheduleDay2', 'scheduleDay3', 'tampil', 'ajukan'));
    }

    public function confirm(Request $request){
        $userId = Auth::id();
        $status = $request->input('status');

        DB::table('jadwal_band')
            ->where('band_id', '=', $userId)
            ->where('status_jadwal', '=', 'sent')
            ->update([
                'status_jadwal' => $status
            ]);

        return redirect('/grup/schedule');
    }

    public function approveSchedule(Request $request){
        $band_id = $request->input('band_id');
        $tanggal = $request->input('tanggal');
        $confirm = $request->input('confirm');

        DB::table('jadwal_band')
            ->where('band_id' , '=' , $band_id)
            ->where('tanggal', '=', $tanggal)
            ->update([
                'status_jadwal' => $confirm
            ]);

        return redirect('/admin/schedule');
    }

    public function request(Request $request){
        DB::table('jadwal_band')->insert([
            'tanggal' => $request->input('tanggal'),
            'band_id' => $request->input('id'),
            'status_jadwal' => 'requested'
        ]);

        return redirect('/grup/schedule');
    }

    public function cancel(Request $request){
        $band_id = $request->input('band_id');
        $tanggal = $request->input('tanggal');
        $status = $request->input('status');

        DB::table('jadwal_band')
            ->where('band_id', '=', $band_id)
            ->where('tanggal', '=', $tanggal)
            ->update([
                'status_jadwal' => $status
            ]);

        return redirect('/admin/schedule');
    }
    
}
