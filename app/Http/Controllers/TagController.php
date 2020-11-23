<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    public function show()
    {

        $tag = tag::with('chanal','Tag')->latest()->get();

        // dd($tag);
        return view('tags', [
           'tag' => $tag,

        ]);


    }




    public function create()
    {
        
        // $tag = tag::all();
        // $tag = Tag::all();
        // $chanal = chanal::all();
        // $chanal = DB::table('chanals')->latest()->get();
        
        // $tag = DB::table('tag')->latest()->get();
        // $chanal = DB::table('chanal')->latest()->get();
        return view('forms.create_tag' , [
            // 'tag' => $tag,
            'tag' => Tag::all(),
            

            // 'chanal' => DB::table('chanals')->get()
        ]);
    }

    public function store(tag $tag)
    {
// dd(request()->all());

        // dd(request()->all());

        $tag = new tag($this->validateTag());
        $tag->save();
        // $tag->chanal()->attach(request('chanals'));

        

        return redirect(Route('dashboard'));

    }

    public function edit($id)
    {
        $tag = tag::findOrFail($id);
        

        return view('forms.edit_tag' , [
            'tag' => $tag,

        ]);

    }

    public function update($id)
    {


        $tag = tag::findOrFail($id);
        $tag->update($this->validatetag());
        
            $tag->name = request('name');
            $tag->save();


        return redirect('/dashboard');

    }

    public function delete($id)
    {

        $tag = Tag::findOrFail($id)->delete();
        
        return redirect(Route('dashboard'));
    }

    public function validateTag()
    {


       return request()->validate([

            'name' => 'required',
            ]);

            // $tag->user_id = auth()->user()->id;
            // $tag->c_name = request('c_name');
            // $tag->slug = request('slug');
            // $tag->url = request('url');
            // $tag->chanal_id = request('chanal_id');
            // $tag->save();

            // return redirect('/chanals/' . $tag->chanal_id);

    }
}