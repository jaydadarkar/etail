<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = ProductAttribute::with('attributeValues')->get();
        return response()->json($attributes, 200);
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
        $product_attribute = ProductAttribute::create([
            'attribute_name' => $request->attribute_name,
            'attribute_slug' => Str::of($request->attribute_slug)->slug('-'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return response()->json($product_attribute , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttribute $productAttribute)
    {
        ProductAttribute::where('id', $request->id)->update([
            "attribute_name" => $request->attribute_name,
            "attribute_slug" => $request->attribute_slug,
            "updated_at" => now()
        ]);

        if(!empty($request->attribute_values)){
            $values =  ProductAttributeValue::where('attribute_id', $request->id)->first();
            if(!empty($values)){
                ProductAttributeValue::where('attribute_id', $request->id)->update([
                    'attribute_values' => $request->attribute_values,
                    "updated_at" => now()
                ]);
            }
            else{
                ProductAttributeValue::create([
                    'attribute_id' => $request->id,
                    'attribute_values' => $request->attribute_values,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }

        return response()->json('Product Attribute Updated',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        ProductAttribute::where('id', $request->id)->delete();
        ProductAttributeValue::where('attribute_id', $request->id)->delete();

        return response()->json('Product Attribute And Values Deleted',200);
    }
}
