<?php

namespace App\Http\Controllers;
use DB;
use App\Models\course;
use App\Models\chanal;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function show()
    {
        // $course12 = DB::table('courses')->get('chanal_id');
        
        $course = course::with('chanal','Tag')->Paginate(6);
        // $course1 = chanal::with('course')->where('id' , '=' , $course12->chanal_id)->get();
        $chanal = chanal::with('Tag')->Paginate(6);
        $chanalId = DB::table('courses')->select('chanal_id')->first();
        
        $courseCount = DB::table('chanals')->where('id', $chanalId->chanal_id)->get();
        // dd($courseCount);
        // $tag = DB::table('tags')->where('id',$id)->get();
        // $chanal = DB::table('chanal')->latest()->get();
        return view('home', [
           'course' => $course,
           'chanal' => $chanal,
           'courseCount' => $courseCount
        ]);


    }
}