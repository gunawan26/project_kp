<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $first_time_login = false;
        if (User::first() == null) {
            $first_time_login = true;
            $this->register($request, $first_time_login);
        }
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            // dd($this->respondWithToken($token));
            return $this->respondWithToken($token);
        }
        dd("sampai sini");
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'username' => JWTAuth::user()->fullname,

            'token_type' => 'bearer',
            'role' => JWTAuth::user()->role
            // 'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard('api');
    }

    /**
     * register user
     * 
     */

    public function register(Request $request, $roleSts)
    {
        if ($roleSts) {

            $request->request->add([
                'password_confirmation' =>  $request->password,
                'name' => null,
                'fullname' => null,
                'gender' => null,
                'phonenumber' => null,
                'signature' => null


            ]);
        }
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'string', 'max:100', 'unique:users'],
            'fullname' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['nullable', Rule::in([1, 0]),],
            'phonenumber' => ['nullable', 'string', 'max:20'],
            'signature' => ['nullable'],

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'        => false,
                'msg'           => 'input salah',
                'access_token'  => null,
                'error'         => $validator->messages(),
            ], 400);
        }

        $this->create($request->all(), $roleSts);
        return response()->json("sukses", 200);
    }


    protected function create(array $data, $roleSts)
    {
        if ($roleSts) {
            $admin_sts = 1;
        } else {
            $admin_sts = 0;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fullname' => $data['fullname'],
            'gender' => $data['gender'],
            'phonenumber' => $data['phonenumber'],
            'signature' => $data['signature'],
            'role' => $admin_sts
        ]);
    }

    public function test()
    {
        return "sukses";
    }
}
