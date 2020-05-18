<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryname = $request->name ? $request->name : '';
      $categories = Category::where('name', 'like', '%'.$categoryname.'%')
        ->paginate(10);
        return view('category.index')->withCategories($categories)->withCategoryname($categoryname);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('category/create'); 
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
            'name' => 'required|unique:categories,name',
            'description' => 'required',
         ]);


        $category=new Category;
        $category->name=$request->name;
        $category->description=$request->description;
        $category->user_id=Auth::user()->id;
        $category->save();

        return redirect('category')->with('success','Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $category=Category::find($id);
        return view('category/show')->withCategory($category);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {   
        $category=Category::find($id);
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'description' => 'required',
        ]);
        
        $category->name=$request->name;
        $category->description=$request->description;
        $category->save();
        return redirect('category')->with('success', 'Category updated');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('category/edit')->withCategory($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
   
        $category=Category::find($id);
      
        if($category->blogs->count() > 0){
            return back()->with('danger', 'This category has linked blogs, cannot be deleted');
        }
      
        $category->delete(); 
        return redirect('category')->with('success', 'This category has deleted');
    }
}
