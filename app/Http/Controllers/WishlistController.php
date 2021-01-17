<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
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
        $request->validate([
            'product' => 'required|exists:products,id'
        ]);

        $product = Product::where('id', $request->product)->first();

        if(!empty($request->cookie('wishlist'))){
            $data = json_decode($request->cookie('wishlist'), true);
            $data = json_encode(array(
                "products" => $data['products'].','.$product->id
            ));
        }
        else{
            $data = json_encode(array(
                "products" => $product->id
            ));
        }

        if(\Auth::check()){
            $userWishlist = Wishlist::where('user_id', \Auth::user()->id)->first();
            if(!empty($userWishlist)){
                Wishlist::where('user_id', \Auth::user()->id)->update([
                    'data' => $data,
                    'updated_at' => now()
                ]);
            }
            else{
                Wishlist::create([
                    'user_id' => \Auth::user()->id,
                    'data' => $data
                ]);
            }
        }

        return response()->json('Product Added To Wishlist', 200)->withCookie('wishlist', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
