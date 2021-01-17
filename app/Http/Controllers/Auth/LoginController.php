<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Models\Cart;
use App\Models\Wishlist;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(), 422);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('etail_token')->plainTextToken;

            $response = response()->json(['token' => $token, 'role' => $user->role], 200);

            $userCart = Cart::where('user_id', $user->id)->first();
            if(!empty($userCart)){
                $data = $userCart->data;
                if(!empty($request->cookie('cart'))){
                    if($data != $request->cookie('cart')){
                        $data = $request->cookie('cart');
                        Cart::where('user_id', $user->id)->update([
                            'data' => $data,
                            'updated_at' => now()
                        ]);    
                    }
                }
                $response = $response->withCookie('cart', $data);
            }

            if($request->cookie('cart') && empty($userCart)){
                $data = $request->cookie('cart');
                Cart::create([
                    'user_id' => $user->id,
                    'data' => $data,
                    'updated_at' => now()
                ]);
                $response = $response->withCookie('cart', $data);
            }

            $userWishlist = Wishlist::where('user_id', $user->id)->first();
            if(!empty($userWishlist)){
                $data = $userWishlist->data;
                if(!empty($request->cookie('wishlist'))){
                    if($data != $request->cookie('wishlist')){
                        $data = $request->cookie('cart');
                        Wishlist::where('user_id', $user->id)->update([
                            'data' => $data,
                            'updated_at' => now()
                        ]);
                    }
                }
                $response = $response->withCookie('wishlist', $data);
            }

            if($request->cookie('wishlist') && empty($userWishlist)){
                $data = $request->cookie('wishlist');
                Wishlist::create([
                    'user_id' => $user->id,
                    'data' => $data,
                    'updated_at' => now()
                ]);
                $response = $response->withCookie('cart', $data);
            }

            return $response;
        }
        else{
            return response()->json(['error' => 'Invalid Email / Password.'], 401);
        }
        
    }

    public function logout(Request $request)
    {
        if(Auth::user()){
            Auth::user()->tokens()->delete();
            $request->session()->invalidate();
        }

        if(!empty(\Cookie::get('cart'))){
            \Cookie::queue(\Cookie::forget('cart'));
        }

        if(!empty(\Cookie::get('wishlist'))){
            \Cookie::queue(\Cookie::forget('wishlist'));
        }

        return response()->json('You Are Logged Out', 200);
    }
}
