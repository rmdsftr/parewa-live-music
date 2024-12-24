<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    public function uploadVideo(Request $request)
    {
        $path = $request->file('video')->store('uploads/bands/videos', 'public'); 

        DB::table('performance')->insert([
            'performance_id' => $request->input('performance_id'),
            'title' => $request->input('title'),
            'video' => $path,
            'band_id' => $request->input('band_id'),
            'tanggal'=> $request->input('tanggal')
        ]);

        return back()->with('success', 'Video uploaded successfully!');
    }

    public function show($performance_id){
        $detail = DB::table('performance_value')
            ->where('performance_id', '=' , $performance_id)
            ->get();

        $performance = DB::table('performance')
            ->where('performance_id', '=' , $performance_id)->first();
            
        $value = DB::table('performance_value')
            ->select('performance_value.*', 'users.name')
            ->join('users', 'performance_value.id', '=', 'users.id')
            ->where('performance_value.performance_id', '=', $performance_id)
            ->get();

        return view('user/bandperform', compact('detail', 'performance', 'value'));
    }

    public function rating(Request $request)
    {

        DB::table('performance_value')->insert([
            'performance_id' => $request->input('performance_id'),
            'id' => $request->input('id'),
            'rating' => $request->input('rating'),
            'review' => $request->input('review')
        ]);

        return redirect()->back()->with('success', 'Your review has been submitted.');
    }

    // private function updatePerformanceRating($performanceId)
    // {
    
    //     $performance = PerformanceValue::find($performanceId);
        
    //     $averageRating = PerformanceValue::where('performance_id', $performanceId)->avg('rating');
        
    //     $totalReview = PerformanceValue::where('performance_id', $performanceId)->count();

    //     $performance->update([
    //         'rating_averange' => $averageRating,
    //         'total_review' => $totalReview
    //     ]);
    // }

    // public function show($id)
    // {
    //     $performance = Performance::with(['band', 'reviews.user'])
    //         ->where('performance_id', $id)
    //         ->first();

    //     if (!$performance) {
    //         return redirect()->route('home')->with('error', 'Performance not found');
    //     }

    //     $averageRating = $performance->performance_value->avg('rating') ?? 0;

    //     return view('performance.show', compact('performance', 'averageRating'));
    // }

    // public function uploadPerformanceClip(Request $request, $id)
    // {
    //     $validator = FacadesValidator::make($request->all(), [
    //         'title' => 'required|string|max:255',
    //         'video' => 'required|mimes:mp4,avi,mov,webm|max:10240',
    //     ]);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator)->withInput();
    //     }

    //     $performance = Performance::find($id);

    //     if (!$performance) {
    //         return redirect()->route('home')->with('error', 'Performance not found.');
    //     }

    //     if ($request->hasFile('video')) {
    //         $fileName = time() . '_' . $request->file('video')->getClientOriginalName();
            
    //         $path = $request->file('video')->storeAs('uploads/videos', $fileName, 'public');
            
    //         $performance->video = $fileName; 
    //         $performance->video_title = $request->input('title'); 
    //         $performance->save();
    //     }

    //     return redirect()->route('/admin', ['id' => $performance->performance_id])
    //                      ->with('success', 'Performance video uploaded successfully!');
    // }
}
