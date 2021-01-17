<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Controllers\ProductAttribute;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $p = new Product;
        if($request->category){
            $request->category = str_replace('&&','',$request->category);
            $p = $p->where('product_category', 'like', '%'.strval($request->category).'%');
        }
        if($request->min && $request->max){
            $min = $request->min;
            $max = $request->max;
            $p = $p->whereBetween('product_price', array($min, $max));
        }
        if($request->attribute){
            $attributes = explode(',', $request->attribute);
            foreach($attributes as $attribute){
                $p = $p->where('product_variation', 'like', '%'.$attribute.'%');
            }
        }

        $p = $p->where('product_quantity', '>', 0);
        $p = $p->get();
        $p = $p->makeHidden(['product_link']);
        $p = $p->groupBy('product_sku');
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
                    'product_other_images' => !empty($request->product_other_images) ? $request->product_other_images : null,
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
                    'product_link' => $request->product_link,
                    'product_short_desc' => $request->product_short_desc,
                    'product_long_desc' => $request->product_long_desc,
                    'product_type' => $request->product_type,
                    'product_mrp' => $request->product_mrp,
                    'product_price' => $request->product_price,
                    'product_quantity' => 0,
                    'product_primary_image' => $request->product_primary_image,
                    'product_other_images' => !empty($request->product_other_images) ? $request->product_other_images : null,
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

            case 'digital':
                $p = Product::create([
                    'product_name' => $request->product_name,
                    'product_sku' => $request->product_sku,
                    'product_slug' => $request->product_name,
                    'product_category' => $request->product_category,
                    'product_brand' => $request->product_brand,
                    'product_link' => $request->product_link,
                    'product_short_desc' => $request->product_short_desc,
                    'product_long_desc' => $request->product_long_desc,
                    'product_type' => $request->product_type,
                    'product_mrp' => $request->product_mrp,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'product_primary_image' => $request->product_primary_image,
                    'product_other_images' => !empty($request->product_other_images) ? $request->product_other_images : null,
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

            case 'variable':
                // Create Parent
                $p = Product::create([
                    'product_name' => $request->product_name,
                    'product_sku' => $request->product_sku,
                    'product_slug' => $request->product_name,
                    'product_category' => $request->product_category,
                    'product_brand' => $request->product_brand,
                    'product_short_desc' => $request->product_short_desc,
                    'product_long_desc' => $request->product_long_desc,
                    'product_type' => $request->product_type,
                    'product_mrp' => null,
                    'product_price' => 0,
                    'product_quantity' => 0,
                    'product_primary_image' => $request->product_primary_image,
                    'product_other_images' => !empty($request->product_other_images) ? $request->product_other_images : null,
                    'product_meta_keywords' => $request->product_meta_keywords,
                    'product_meta_desc' => $request->product_meta_desc,
                    'product_published' => $request->product_published,
                    'product_featured' => ($request->product_featured == true) ? 1 : 0,
                    'product_tags' => $request->product_tags,
                    'product_dimensions' => $request->product_dimensions,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);    

                // Variation Starts
                $arr = collect($request->product_variation_attributes);

                // Group Values By Their Attribute Id
                $arr = $arr->groupBy('attribute_id');
                $result = collect();

                // Foreach Attribute Id
                foreach($arr as $col){
                    $result = ProductController::recursiveVariation($result, $col);
                }

                // Foreach Attribute Value Combination
                foreach ($result as $key => $value) {
                    // Flatten The Array
                    $abc = \Arr::flatten($value);
                    $variation = '';
                    for($i = 0; $i < count($abc); $i++){
                        // If Modulus Is 0 Then It Is Attribute Else It Is Value
                        if($i%2 == 0){
                            // Get The Attribute Name
                            $attribute = ProductAttributeController::show($abc[$i]);
                            $variation .= $attribute->attribute_name.':';
                        }
                        else{
                            // For The Comma (,) In The String
                            if(count($abc) == $i + 1){
                                $variation .= $abc[$i];
                            }
                            else{
                                $variation .= $abc[$i].',';
                            }
                        }
                    }
                    // Child Product
                    $p = Product::create([
                        'product_name' => $request->product_name . ' ' . '(' .$variation. ')',
                        'product_sku' => $request->product_sku,
                        'product_slug' => $request->product_name . ' ' . '(' .$variation. ')',
                        'product_category' => $request->product_category,
                        'product_brand' => $request->product_brand,
                        'product_short_desc' => $request->product_short_desc,
                        'product_long_desc' => $request->product_long_desc,
                        'product_type' => 'simple',
                        'product_variation' => $variation,
                        'product_mrp' => null,
                        'product_price' => 0,
                        'product_quantity' => 0,
                        'product_primary_image' => $request->product_primary_image,
                        'product_other_images' => !empty($request->product_other_images) ? $request->product_other_images : null,
                        'product_meta_keywords' => $request->product_meta_keywords,
                        'product_meta_desc' => $request->product_meta_desc,
                        'product_published' => $request->product_published,
                        'product_featured' => ($request->product_featured == true) ? 1 : 0,
                        'product_tags' => $request->product_tags,
                        'product_dimensions' => $request->product_dimensions,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);    
                }
            break;
            }
        
        return response()->json('Product Created', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $p = Product::where('product_slug', $request->slug)->with(['questions', 'rating', 'variations'])->first();
        if($p->product_type == 'digital'){
            $p = $p->makeHidden(['product_link']);
        }
        $p->category_detail = ProductCategory::whereIn('id', $p->product_category)->get();
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
                $p = Product::where('id', $request->id)->first();

                $p->product_name = $request->product_name;
                $p->product_sku = $request->product_sku;
                $p->product_slug = $request->product_name;
                $p->product_category = $request->product_category;
                $p->product_brand = $request->product_brand;
                $p->product_short_desc = $request->product_short_desc;
                $p->product_long_desc = $request->product_long_desc;
                $p->product_type = $request->product_type;
                $p->product_mrp = $request->product_mrp;
                $p->product_price = $request->product_price;
                $p->product_quantity = $request->product_quantity;
                $p->product_primary_image = $request->product_primary_image;
                $p->product_other_images = !empty($request->product_other_images) ? $request->product_other_images : null;
                $p->product_meta_keywords = $request->product_meta_keywords;
                $p->product_meta_desc = $request->product_meta_desc;
                $p->product_published = $request->product_published;
                $p->product_featured = ($request->product_featured == true) ? 1 : 0;
                $p->product_tags = $request->product_tags;
                $p->product_dimensions = $request->product_dimensions;
                $p->updated_at = Carbon::now();
                $p->save();

                break;
            case 'affiliate': 
                $p = Product::where('id', $request->id)->first();

                $p->product_name = $request->product_name;
                $p->product_sku = $request->product_sku;
                $p->product_slug = $request->product_name;
                $p->product_category = $request->product_category;
                $p->product_brand = $request->product_brand;
                $p->product_affiliate_link = $request->product_affiliate_link;
                $p->product_short_desc = $request->product_short_desc;
                $p->product_long_desc = $request->product_long_desc;
                $p->product_type = $request->product_type;
                $p->product_mrp = $request->product_mrp;
                $p->product_price = $request->product_price;
                $p->product_quantity = 0;
                $p->product_primary_image = $request->product_primary_image;
                $p->product_other_images = !empty($request->product_other_images) ? $request->product_other_images : null;
                $p->product_meta_keywords = $request->product_meta_keywords;
                $p->product_meta_desc = $request->product_meta_desc;
                $p->product_published = $request->product_published;
                $p->product_featured = ($request->product_featured == true) ? 1 : 0;
                $p->product_tags = $request->product_tags;
                $p->product_dimensions = $request->product_dimensions;
                $p->updated_at = Carbon::now();
                $p->save();

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
    public function destroy(Request $request)
    {
        $p = Product::where('id', $request->id)->first();
        if($p){
            if($p->product_type == 'variable'){
                Product::where('product_sku', $p->product_sku)->delete();
            }
            else{
                Product::destroy($request->id);
            }
            return response()->json('Product Deleted', 200);    
        }
        return response()->json('Invalid Data', 422);
    }
    
    /**
     * Recursive Function For Cross Joining Variations.
     *
     * @param  Collection  $collectionA
     * @param  Collection  $collectionB
     * @return Collection  $collection
     */
    
    public function recursiveVariation($collectionA, $collectionB){
        if(count($collectionA) == 0){
            // Return The First Collection
            return $collectionB;
        }
        // Cross Join The 2 Collections
        return $collectionA->crossJoin($collectionB);
    }

    public function variation(Request $request){
        return Product::where([['product_sku', $request->main_sku], ['product_variation', '=' , serialize($request->variation)]])->first();
    }
}
