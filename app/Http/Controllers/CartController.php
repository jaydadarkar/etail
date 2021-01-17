<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(\Auth::check()){
            $data = Cart::where('user_id', \Auth::user()->id)->first()->data;
            if(!empty($data)){
                $data = json_decode($data);
                $productsMap = explode(',', $data->products);
                $cart = array();
                $cart['products'] = array();
                foreach ($productsMap as $product) {
                    $mix = explode(':', $product);
                    $cart['products'][$mix[0]] = Product::where('id', $mix[0])->first(['id', 'product_slug', 'product_name',
                                        'product_variation', 'product_type', 'product_primary_image', 'product_mrp',
                                        'product_price', 'product_sku']);
                    $cart['products'][$mix[0]]->quantity = $mix[1];
                }

                $cart['totalQuantity'] = $data->totalQuantity;
                $cart['tax'] = $data->tax;
                $cart['shipping'] = $data->shipping;
                $cart['coupon'] = $data->coupon;
                $cart['subTotal'] = $data->subTotal;
                $cart['total'] = $data->total;

                return response()->json($cart, 200);
            }
            else{
                return response()->json('Your Cart Is Empty.', 200);
            }
        }
        elseif(!empty($request->cookie('cart'))){
            $data = json_decode($request->cookie('cart'));
            $productsMap = explode(',', $data->products);
                $cart = array();
                $cart['products'] = array();
                foreach ($productsMap as $product) {
                    $mix = explode(':', $product);
                    $cart['products'][$mix[0]] = Product::where('id', $mix[0])->first(['id', 'product_slug', 'product_name',
                                        'product_variation', 'product_type', 'product_primary_image', 'product_mrp',
                                        'product_price', 'product_sku']);
                    $cart['products'][$mix[0]]->quantity = $mix[1];
                }

                $cart['totalQuantity'] = $data->totalQuantity;
                $cart['tax'] = $data->tax;
                $cart['shipping'] = $data->shipping;
                $cart['coupon'] = $data->coupon;
                $cart['subTotal'] = $data->subTotal;
                $cart['total'] = $data->total;

                return response()->json($cart, 200);
        }
        else{
            return response()->json('Your Cart Is Empty.', 200);
        }
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
        $request->validate([
            'product' => 'required|exists:products,id',
            'quantity' => 'required|integer'
        ]);

        $product = Product::where('id', $request->product)->first();
        if($product->product_quantity < $request->quantity){
            return response()->json('This Product Has Not Enough Quantity.', 422);
        }

        if(!empty($request->cookie('cart'))){
            $data = json_decode($request->cookie('cart'), true);
            $data = json_encode(array(
                "products" => $data['products'].','.$product->id.':'.$request->quantity,
                "totalQuantity" => ($data['totalQuantity'] + $request->quantity),
                "tax" => '',
                "shipping" => '',
                "coupon" => '',
                "subTotal" => ($data['total'] + ($request->quantity * $product->product_price)),
                "total" => ($data['total'] + ($request->quantity * $product->product_price))
            ));
        }
        else{
            $data = json_encode(array(
                "products" => $product->id.':'.$request->quantity,
                "totalQuantity" => $request->quantity,
                "tax" => '',
                "shipping" => '',
                "coupon" => '',
                "subTotal" => ($request->quantity * $product->product_price),
                "total" => ($request->quantity * $product->product_price)
            ));
        }

        if(\Auth::check()){
            $userCart = Cart::where('user_id', \Auth::user()->id)->first();
            if(!empty($userCart)){
                Cart::where('user_id', \Auth::user()->id)->update([
                    'data' => $data,
                    'updated_at' => now()
                ]);
            }
            else{
                Cart::create([
                    'user_id' => \Auth::user()->id,
                    'data' => $data
                ]);
            }
        }

        return response()->json('Product Added To Cart', 200)->withCookie('cart', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'product_quantity' => 'required|integer'
        ]);

        if(\Auth::check()){
            $cart = Cart::where('user_id', \Auth::user()->id)->first();
        }
        else{
            $cart = $request->cookie('cart');
        }

        if(!empty($cart)){
            $product = Product::where('id', $request->product_id)->first();
            if(!empty($product)){

            }
            else{
                return response()->json("Cannot Find The Product", 422);
            }    
        }
        else{
            return response()->json('Unprocessable Request', 422);
        }        
    }
}
