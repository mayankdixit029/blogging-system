<?php

namespace App\Http\Controllers;
use App\Category;
use App\Blog;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = $request->title ? $request->title : '';
        $category = $request->category ? $request->category : '';
        $blogs = Blog::where('title', 'like', '%'.$title.'%')
        ->where('category_id', 'like', '%'.$category.'%')
        ->paginate(10);
        return view('blog.index')->withBlogs($blogs)->withTitle($title)->withCategory($category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $categories= Category::all();
        $tags= Tag::all();
        return view('blog/create')->withCategories($categories)->withTags($tags); 
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
            'title' => 'required|unique:blogs,title',
            'description' => 'required',
            'category_id'=> 'required',
            'tag_id'=>'required'
        ]);
        $blog = new Blog;
        $blog->title =$request->title;
        $blog->description=$request->description;
        $blog->category_id= $request->category_id;
        $blog->save();
        $blog->tags()->sync($request->tag_id);
        return redirect('blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
     
         $blog=Blog::find($id); 
         return view('blog.show')->withBlog($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $tags=Tag::all();
        $blog=Blog::find($id);
        return view('blog/edit')->withBlog($blog)->withCategories($categories)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $blog=Blog::find($id);
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->category_id=$request->category_id;
        $blog->save();
        $blog->tags()->sync($request->tag_id);
        return redirect('blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $blog=Blog::find($id);
        $blog->delete();
         
        return redirect('blog');
    }
}
