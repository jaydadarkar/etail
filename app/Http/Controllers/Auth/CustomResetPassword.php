<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\User;
use DB;
use Carbon\Carbon;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomResetPassword extends Controller
{
    public function reset(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(), 422);
        }
        else{
            $tokenData = \Str::random(60);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $tokenData,
                'created_at' => Carbon::now()
            ]);
            if ($this->sendResetEmail($request->email, $tokenData)) {
                return response()->json(['message' => 'Password Reset Email Sent Successfully'], 200);
            } else {
                return response()->json(['message' => 'Password Reset Request Failed'], 500);
            }
        }
    }

    private function sendResetEmail($email, $token)
    {
        $user = User::where('email', $email)->select('name', 'email')->first();
        $link = config('app.url') . '/password/reset/' . $token . '?email=' . urlencode($user->email);
        $text = 'Hi '.$user->name.', reset your password : '.$link;
        
        try {
            \Mail::raw($text, function ($message) use($user){
                $message->to($user->email)->subject('Password Reset Request');
              });
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function resetPasswordWithToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
            'token' => 'required|string' ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['message' => 'Please complete the form']);
        }

        $password = $request->password;
        $tokenData = DB::table('password_resets')->where('token', $request->token)->first();
        if (!$tokenData) return redirect()->back()->withErrors(['message' => 'Invalid Request']);

        $user = User::where('email', $tokenData->email)->first();
        if (!$user) return redirect()->back()->withErrors(['message' => 'Email not found']);
        $user->password = bcrypt($password);
        $user->save();

        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        if ($this->sendSuccessEmail($tokenData->email)) {
            return response()->json(['Reset Success'], 200);
        } else {
            return response()->json(['Reset Failed'], 500);
        }
    }

    private function sendSuccessEmail($email){
        try {
            \Mail::raw('Password Reset Successfull', function ($message) use($email){
                $message->to($email)->subject('Password Reset Success');
              });
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}