<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;


class AuthController extends Controller
{
  public function register(Request $request)
  {
      $credentials = $request->only('name', 'email', 'password');

      $rules = [
          'name' => 'required|min:4',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:4'

      ];

      $validator = Validator::make($credentials, $rules);
        if($validator->fails())
        {
          return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);

        $user = User::create(['name' => $name, 'email' => $email, 'password' => ($password)]);
}




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($credentials, $rules);
            if($validator->fails())
            {
              return response()->json(['success'=> false, 'error'=> $validator->messages()]);
            }

        $credentials['is_verified'] = 1;

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials))
            {
                return response()->json(['success' => false, 'error' => 'Cant find an account '], 401);
            }
        }

        catch (JWTException $e)
        {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }

        // all good so return the token
       return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);
    }

    public function logout(Request $request)
    {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }
