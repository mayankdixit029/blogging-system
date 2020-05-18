<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $tagname = $request->name ? $request->name : '';
         $tags = Tag::where('name', 'like', '%'.$tagname.'%')
        ->paginate(10);
        return view('tag.index')->withTags($tags)->withTagname($tagname);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag/create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|unique:tags,name',
           
         ]);

        $tag=new Tag;
        $tag->name=$request->name;
         $tag->save();

        return redirect('tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        //$blognames=Blog::all();
        $tag=Tag::find($id);
        return view('tag/show')->withTag($tag);//->withBlognames($blognames);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tag=Tag::find($id);
      return view('tag/edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag=Tag::find($id);
        $request->validate([
            'name' => 'required|unique:tags,name,'.$tag->id,
         ]);
        $tag->name=$request->name;
        $tag->save();
        return redirect('tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $tag=Tag::find($id);
        $tag->delete();
        return redirect('tag');
    }
}
