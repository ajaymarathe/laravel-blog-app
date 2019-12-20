<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->paginate(6);
        return CategoryResource::collection($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request['slug'] = str_slug($request->name);
        Category::create($request->all());
        return response()->json(['200' => 'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // $CategoryData = CategoryResource::collection($category);
        return $category;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request['slug'] = str_slug($request->name);
        $category->update($request->all());
        return response('updated', '200');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response('deleted', '404');
    }

 
}
