<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p = Product::get();
        return response()->json($p, 200);
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
        $p;
        switch($request->product_type){
            case 'simple':
                $p = Product::create([
                    'product_name' => $request->product_name,
                    'product_sku' => $request->product_sku,
                    'product_slug' => $request->product_name,
                    'product_category' => $request->product_category,
                    'product_brand' => $request->product_brand,
                    'product_short_desc' => $request->product_short_desc,
                    'product_long_desc' => $request->product_long_desc,
                    'product_type' => $request->product_type,
                    'product_mrp' => $request->product_mrp,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'product_primary_image' => $request->product_primary_image,
                    'product_other_images' => $request->product_other_images,
                    'product_meta_keywords' => $request->product_meta_keywords,
                    'product_meta_desc' => $request->product_meta_desc,
                    'product_published' => $request->product_published,
                    'product_featured' => ($request->product_featured == true) ? 1 : 0,
                    'product_tags' => $request->product_tags,
                    'product_dimensions' => $request->product_dimensions,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                break;

            case 'affiliate':
                $p = Product::create([
                    'product_name' => $request->product_name,
                    'product_sku' => $request->product_sku,
                    'product_slug' => $request->product_name,
                    'product_category' => $request->product_category,
                    'product_brand' => $request->product_brand,
                    'product_affiliate_link' => $request->product_affiliate_link,
                    'product_short_desc' => $request->product_short_desc,
                    'product_long_desc' => $request->product_long_desc,
                    'product_type' => $request->product_type,
                    'product_mrp' => $request->product_mrp,
                    'product_price' => $request->product_price,
                    'product_quantity' => 0,
                    'product_primary_image' => $request->product_primary_image,
                    'product_other_images' => $request->product_other_images,
                    'product_meta_keywords' => $request->product_meta_keywords,
                    'product_meta_desc' => $request->product_meta_desc,
                    'product_published' => $request->product_published,
                    'product_featured' => ($request->product_featured == true) ? 1 : 0,
                    'product_tags' => $request->product_tags,
                    'product_dimensions' => $request->product_dimensions,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            break;
            case 'variable':break;
        }
        
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
        $p;
        switch($request->product_type){
            case 'simple': 
                $p = Product::where('id', $request->id)->update([
                    'product_name' => $request->product_name,
                    'product_sku' => $request->product_sku,
                    'product_slug' => $request->product_name,
                    'product_category' => $request->product_category,
                    'product_brand' => $request->product_brand,
                    'product_short_desc' => $request->product_short_desc,
                    'product_long_desc' => $request->product_long_desc,
                    'product_type' => $request->product_type,
                    'product_mrp' => $request->product_mrp,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'product_primary_image' => $request->product_primary_image,
                    'product_other_images' => $request->product_other_images,
                    'product_meta_keywords' => $request->product_meta_keywords,
                    'product_meta_desc' => $request->product_meta_desc,
                    'product_published' => $request->product_published,
                    'product_featured' => ($request->product_featured == true) ? 1 : 0,
                    'product_tags' => $request->product_tags,
                    'product_dimensions' => $request->product_dimensions,
                    'updated_at' => Carbon::now()
                ]);
                break;
            case 'affiliate': 
                $p = Product::where('id', $request->id)->update([
                    'product_name' => $request->product_name,
                    'product_sku' => $request->product_sku,
                    'product_slug' => $request->product_name,
                    'product_category' => $request->product_category,
                    'product_brand' => $request->product_brand,
                    'product_affiliate_link' => $request->product_affiliate_link,
                    'product_short_desc' => $request->product_short_desc,
                    'product_long_desc' => $request->product_long_desc,
                    'product_type' => $request->product_type,
                    'product_mrp' => $request->product_mrp,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'product_primary_image' => $request->product_primary_image,
                    'product_other_images' => $request->product_other_images,
                    'product_meta_keywords' => $request->product_meta_keywords,
                    'product_meta_desc' => $request->product_meta_desc,
                    'product_published' => $request->product_published,
                    'product_featured' => ($request->product_featured == true) ? 1 : 0,
                    'product_tags' => $request->product_tags,
                    'product_dimensions' => $request->product_dimensions,
                    'updated_at' => Carbon::now()
                ]);
                break;
            case 'variable': break;
        }
        
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
