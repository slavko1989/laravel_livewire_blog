<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories  = Category::all();

        //$categories  = Category::with('subCategories')->whereNull('parent_id')->get();
       return view('dashboard.categories.index',[
            'categories'=>Category::with('subCategories')->whereNull('parent_id')->get(), 
        ]);

        //return view('dashboard.categories.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create',['categories'=>Category::with('subCategories')->whereNull('parent_id')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        
        $request->validated();
        $category = new Category;
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect()->route('categories.index')->with('success','Category successfully created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //$category = Category::with('subCategories')->whereNull('parent_id')->get();
        return view('dashboard.categories.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'=>['required','unique:categories'],
            'parent_id'=>['sometimes','nullable'],
        ]);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('categories.index')->with('success','Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
                return redirect()->route('categories.index')->with('success','Category successfully deleted');

    }
}
