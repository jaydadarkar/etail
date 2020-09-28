<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;

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
    public function create(Request $request)
    {
            DB::table('products')->insert([
                'product_name' => 'abc',
                'product_sku' => 'ABC',
                'product_slug' => 'abc',
                'product_category' => 'abc',
                'product_variation' => '[size: M]',
                'product_short_desc' => 'abc',
                'product_long_desc' => 'ABC',
                'product_mrp' => 599,
                'product_price' => 599,
                'product_primary_image' => 'abc',
                'product_other_images' => 'abc',
                'product_meta_keywords' => 'abc',
                'product_meta_desc' => 'abc',
                'product_featured' => 1,
                'product_tags' => 'abc',
                'created_at' => '',
                'updated_at' => ''
            ]);
            return response()->json('Product Created', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
