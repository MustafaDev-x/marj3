<?php

namespace App\Http\Controllers;
use App\Models\course;
use App\Models\chanal;
use App\Models\Tag;
use DB;
use Illuminate\Http\Request;

class CourseController extends Controller
{
       public function show()
    {

        $course = course::with('chanal','Tag')->latest()->get();

        // dd($course);
        return view('courses', [
           'course' => $course,

        ]);


    }




    public function create()
    {
        
        // $course = course::all();
        // $tag = Tag::all();
        // $chanal = chanal::all();
        // $chanal = DB::table('chanals')->latest()->get();
        
        // $course = DB::table('course')->latest()->get();
        // $chanal = DB::table('chanal')->latest()->get();
        return view('forms.create_course' , [
            // 'course' => $course,
            'tag' => Tag::all(),
            'chanal' => chanal::all(),
            

            // 'chanal' => DB::table('chanals')->get()
        ]);
    }

    public function store(course $course)
    {
// dd(request()->all());

        // dd(request()->all());

        $course = new course($this->validateCourse());
        $course->user_id = auth()->user()->id;
        $course->save();
        // $course->chanal()->attach(request('chanals'));
        $course->Tag()->attach(request('tags'));
        

        return redirect(Route('dashboard'));

    }

    public function edit($id)
    {
        $course = course::findOrFail($id);
        
        // $course = DB::table('course')->latest()->get();
        // $chanal = DB::table('chanal')->latest()->get();
        return view('forms.edit_course' , [
            'course' => $course,
            'tag' => Tag::all(),
            'chanal' => chanal::all(),
        ]);

        // with('chanals')->
    }

    public function update($id)
    {

        // dd(request()->all());
        $course = course::findOrFail($id);
        $course->update($this->validateCourse());
        
            $course->c_name = request('c_name');
            $course->slug = request('slug');
            $course->url = request('url');
            $course->chanal_id = request('chanal_id');
            $course->save();

        $course->Tag()->detach(request('tags'));
        $course->Tag()->attach(request('tags'));

        return redirect('/dashboard');

    }

    public function delete($id)
    {

        $course = course::findOrFail($id)->delete();
        
        return redirect(Route('dashboard'));
    }


    public function validateCourse()
    {


       return request()->validate([

            'c_name' => 'required',
            'slug' => 'required',
            'url' => 'required',
            'tags' => 'exists:tags,id',
            'chanal_id' => 'exists:chanals,id',
            ]);

            // $course->user_id = auth()->user()->id;
            // $course->c_name = request('c_name');
            // $course->slug = request('slug');
            // $course->url = request('url');
            // $course->chanal_id = request('chanal_id');
            // $course->save();

            // return redirect('/chanals/' . $course->chanal_id);

    }
}