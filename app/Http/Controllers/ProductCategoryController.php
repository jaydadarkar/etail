<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_category = ProductCategory::create([
            'product_category_name' => $request->product_category_name,
            'product_category_slug' => Str::of($request->product_category_slug)->slug('-'),
            'product_category_desc' => $request->product_category_desc,
            'product_cat_meta_keywords' => $request->product_cat_meta_keywords,
            'product_cat_meta_desc' => $request->product_cat_meta_desc,
            'product_cat_featured_image' => $request->product_cat_featured_image,
            'product_cat_parent_id' => $request->product_cat_parent_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return response()->json($product_category , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        $productCategory = ProductCategory::get();
        return response()->json($productCategory, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
        $note = ProductCategory::where('id',$request->id)->delete();
            return response()->json('Deleted',200);
        }
        catch(Exception $e){
            return response()->json($e, 422);
        }
    }
}
