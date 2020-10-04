<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class ProductController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = Product::create([
            'product_name' => $request->name,
            'product_sku' => $request->sku,
            'product_slug' => $request->slug,
            'product_category' => $request->category,
            'product_variation' => $request->variation,
            'product_short_desc' => $request->short_desc,
            'product_long_desc' => $request->long_desc,
            'product_mrp' => $request->mrp,
            'product_price' => $request->price,
            'product_primary_image' => $request->image,
            'product_other_images' => $request->other_image,
            'product_meta_keywords' => $request->keywords,
            'product_meta_desc' => $request->meta_desc,
            'product_featured' => $request->featured,
            'product_tags' => $request->tags,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return response()->json($p, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $p = Product::where('product_slug', $request->slug)->first();
        return response()->json($p, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $p = Product::where('id', $request->id)->first();
        return response()->json($p, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $p = Product::where('id', $request->id)->update([
            'product_name' => $request->name,
            'product_sku' => $request->sku,
            'product_slug' => $request->slug,
            'product_category' => $request->category,
            'product_variation' => $request->variation,
            'product_short_desc' => $request->short_desc,
            'product_long_desc' => $request->long_desc,
            'product_mrp' => $request->mrp,
            'product_price' => $request->price,
            'product_primary_image' => $request->image,
            'product_other_images' => $request->other_image,
            'product_meta_keywords' => $request->keywords,
            'product_meta_desc' => $request->meta_desc,
            'product_featured' => $request->featured,
            'product_tags' => $request->tags,
            'updated_at' => Carbon::now()
        ]);
        return response()->json($p, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $p = Product::destroy($request->id);
        return response()->json($p, 200);
    }
}
