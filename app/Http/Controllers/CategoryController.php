<?php

namespace App\Http\Controllers;

use App\Http\Resources\Lookups\CategoryCollection;
use App\Models\Lookups\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CategoryCollection(Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //we don't need this method because we are building an api
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                'name' => 'required|string|max:255',
            ]
        );
        if ($validator->fails()){
            return response(['error' => $validator->errors()], 422);
        }

        return Category::create(
            $request->all()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //we don't need this page because we are building an api
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make(
            $request->all(), [
                'name' => 'required|string|max:255',
            ]
        );
        if ($validator->fails()){
            return response(['error' => $validator->errors()], 422);
        }

        $category->update(
            $request->all()
        );

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookups\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        //$category->softdelete();
        //return "categrory successfuly deleted";
    }
}
