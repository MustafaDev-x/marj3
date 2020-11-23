<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('layouts.dashboard', [
           'course' => DB::table('courses')->latest()->get(),
           'chanal' => DB::table('chanals')->latest()->get(),
           'tag' => DB::table('tags')->latest()->get()
        ]);
    }

}