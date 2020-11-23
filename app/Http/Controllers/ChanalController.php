<?php

namespace App\Http\Controllers;
use DB;
use App\Models\chanal;
use App\Models\course;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Storage;

class ChanalController extends Controller
{





    public function show()
    {
        $chanal = chanal::with('Tag')->get();
        // $chanal = DB::table('chanal')->latest()->get();
        // $chanal = DB::table('chanal')->latest()->get();
        return view('chanals', [
           'chanal' => $chanal,
           'course' => DB::table('courses')->latest()->get()
        ]);


    }

    public function store()
    {
        // dd(request()->all());
        $chanal = new chanal($this->validateChanal());


        if (request()->hasFile('image')) {
            $filename = request()->image->getClientOriginalName();
            if ($chanal->image) {
                Storage::delete('/public/images/' . $chanal->image);
            }
            request()->image->storeAs('images', $filename, 'public');
        }
        $chanal->image = $filename;
        $chanal->user_id = auth()->user()->id;
        $chanal->save();
        // $chanal->chanal()->attach(request('chanals'));
        $chanal->Tag()->attach(request('tags'));
        

        return redirect(Route('dashboard'));

    }


    public function create()
    {

        // $chanal = DB::table('chanal')->latest()->get();
        // $chanal = DB::table('chanal')->latest()->get();
        return view('forms.create_chanal',[
            'tag' => Tag::all()
        ]);


    }


    public function edit($id)
    {
        $chanal = chanal::findOrFail($id);
        
        // $chanal = DB::table('chanal')->latest()->get();
        // $chanal = DB::table('chanal')->latest()->get();
        return view('forms.edit_chanal' , [
            'chanal' => $chanal,
            'tag' => Tag::all(),
        ]);

        // with('chanals')->
    }

    public function update($id)
    {

        
        $chanal = chanal::findOrFail($id);


        $chanal->update($this->validateChanal());
        if (request()->hasFile('image')) {
            $filename = request()->image->getClientOriginalName();
            if ($chanal->image) {

            Storage::delete('/public/images/' . $chanal->image);
                                } 
                                
            request()->image->storeAs('images', $filename, 'public');
            $chanal->image = $filename;
                            }
            
            $chanal->name = request('name');
            $chanal->slug = request('slug');
            $chanal->url = request('url');



            $chanal->save();

        $chanal->Tag()->detach(request('tags'));
        $chanal->Tag()->attach(request('tags'));

        return redirect(Route('dashboard'));

    }

    // public function deleteOldImage($chanal)
    // {
    //         if ($chanal->image) {
    //         Storage::delete('/public/images/' . $chanal->image);
    //                             } 
    // }


    public function validateChanal()
    {

        return request()->validate([

            'name' => 'required',
            'image' => 'mimes:jpeg,png,jpg|max:1014',
            'slug' => 'required',
            'url' => 'required',
            'tags' => 'exists:tags,id',
            ]);



            // $chanal->user_id = auth()->user()->id;
            // $chanal->name = request('name');
            // $chanal->slug = request('slug');
            // $chanal->url = request('url');
            // $chanal->chanal_id = request('chanal_id');
            // $chanal->save();

            // return redirect('/chanals/' . $chanal->chanal_id);

    }

    public function delete($id)
    {

        $chanal = chanal::findOrFail($id)->delete();
        
        return redirect(Route('dashboard'));
    }

public function detail($id)
    {
// $chanal = chanal::with('chanal')->get();
// dd($chanal);
        // $chanal = DB::table('chanal')->latest()->get();
        // $chanal = DB::table('chanal')->latest()->get();
        return view('chanal', [
            'course' => course::where('chanal_id' , $id)->get(),
            'chanal' => chanal::findOrFail($id),
        ]);


    }
}