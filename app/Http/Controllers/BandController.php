<?php

namespace App\Http\Controllers;

use App\Models\band;
use App\Models\Performance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BandController extends Controller
{
    public function regis(){
        return view('user/bandregis');
    }

    public function list(){
        $bands = DB::table('band')->get();

        return view('user/partner', compact('bands'));
    }

    public function listBand(){
        $bands = DB::table('band')->get();

        return view('admin/partner', compact('bands'));
    }

    public function band(){
        $bands = DB::table('band')->get();

        return view('band/partner', compact('bands'));
    }

    public function bandDetail($band_id){
        $band = DB::table('band')->where('band_id', $band_id)->first();

        $performances = DB::table('performance')
            ->where('band_id', '=', $band_id)
            ->get();

        return view('user/bandport', compact('band', 'performances'));
    }

    public function DetailBand($band_id){
        $band = DB::table('band')->where('band_id', $band_id)->first();

        $performances = DB::table('performance')
            ->where('band_id', '=', $band->band_id)
            ->get();

        return view('admin/bandport', compact('band', 'performances'));
    }

    public function registration(){
        $regis = DB::table('band')
        ->select('band.*')
        ->where('status_band', '=' , 'pending')
        ->get();

        return view('admin/bandregis', compact('regis'));
    }

    public function approve($band_id){
        $detail = DB::table('band')
            ->select('band.*')
            ->where('band_id', '=', $band_id)
            ->first();

        return view('admin/registration', compact('detail'));
    }

    public function action(Request $request){
        $bandId = $request->input('band_id');
        $action = $request->input('action');

        if($action === 'reject'){
            DB::table('band')
                ->where('band_id', $bandId)
                ->delete();
        } else {
            DB::table('band')
                ->where('band_id', $bandId)
                ->update(['status_band' => $action]);
        }

        return redirect('/admin/registration');
    }
    
    public function register(Request $request)
    {
        $groupPhotoPath = $request->file('foto')->store('uploads/bands/photos', 'public');

        $videoId = $this->getYouTubeVideoId($request->input('video'));

        $bandId = $request->input('id');

        $bandExists = DB::table('band')->where('band_id', $bandId)->exists();

        if ($bandExists) {
            return back()->with('alert', 'Anda sudah memiliki band');
        }

        DB::table('band')->insert([
            'band_id' => $bandId,
            'nama_band' => $request->input('bandname'),
            'genre' => $request->input('genre'),
            'foto_band' => $groupPhotoPath,
            'sample_video' => $videoId,
            'no_whatsapp' => $request->input('wa'),
            'link' => $request->input('link'),
            'deskripsi_band' => $request->input('desc'),
            'status_band' => $request->input('status'),
            'id' => $request->input('id')
        ]);

        return back()->with('alert', 'Band berhasil didaftarkan');
    }


    public function getYouTubeVideoId($url)
    {
        preg_match("/(?:youtube\.com\/(?:[^\/]+\/[^\/]+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/", $url, $matches);
        return $matches[1] ?? null;
    }

    public function show($bandId)
    {
        $band = band::with(['performances.performance_value.user'])->where('band_id', $bandId)->first();

        if (!$band) {
            return redirect()->route('home')->with('error', 'Band not found');
        }

        $performances = Performance::with(['performance_value.user'])
            ->where('band_id', $band->band_id)
            ->get();

        return view('band.show', compact('band', 'performances'));
    }


    public function acceptBand($bandId)
    {
        $band = Band::find($bandId);

        if (!$band) {
            return redirect()->back()->with('error', 'Band not found.');
        }

        $band->status_band = 'accepted';
        $band->save();

        return redirect()->back()->with('success', 'Band accepted successfully.');
    }


    public function rejectBand($bandId)
    {
        $band = Band::find($bandId);

        if (!$band) {
            return redirect()->back()->with('error', 'Band not found.');
        }

        $band->status_band = 'rejected';
        $band->save();

        return redirect()->back()->with('success', 'Band rejected successfully.');
    }
}
