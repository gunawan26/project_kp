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
                'fullname' => null,
                'gender' => null,
                'phonenumber' => null,
                'signature' => null,
                'name' => null
            ]);
        }

        $data_user = $request->all();
        $full_name = explode(" ", $request->input('fullname', ''));

        $data_user['name'] = end($full_name);
        $data_user['gender'] = null;
        $data_user['signature'] = null;
        $data_user['phonenumber'] = null;



        $validator = Validator::make($data_user, [
            'name' => ['nullable', 'string', 'max:100'],
            'fullname' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['nullable', Rule::in([1, 0]),],
            'phonenumber' => ['nullable', 'string', 'max:20'],
            'signature' => ['nullable'],

        ]);

        // dd($validator->fails());
        if ($validator->fails()) {
            return response()->json([
                'status'        => false,
                'msg'           => 'input salah',
                'access_token'  => null,
                'error'         => $validator->messages(),
            ], 400);
        } else {
            $this->create($data_user, $roleSts);
            return response()->json("sukses", 200);
        }
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
            'role' => strval($admin_sts)
        ]);
    }


    public function add_user(Request $request)
    {
        $role = 0;
        $res = $this->register($request, false);

        return $res;
        // return response()->json(['sukses'], 200);
    }

    public function show_information_user()
    {
        $data_user = JWTAuth::user();
        $data = [
            'fullname' => $data_user->fullname,
            'name' => $data_user->name,
            'email' => $data_user->email,
            'role' => $data_user->role
        ];

        // dd($data);
        return response()->json(
            $data,
            200
        );
    }

    public function change_user_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => ['nullable', 'string', 'max:100'],
            'fullname' => ['nullable', 'string', 'max:100'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'old_password' => [
                'sometimes', 'required', 'string', 'min:8',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, JWTAuth::user()->password)) {
                        $fail('Old Password didn\'t match');
                    }
                },
            ],
            'new_password' => ['sometimes', 'required', 'string', 'min:8', 'required_with:old_password', 'confirmed'],
            // 'gender' => ['nullable', Rule::in([1, 0]),],
            // 'phonenumber' => ['nullable', 'string', 'max:20'],
            // 'signature' => ['nullable'],

        ]);

        dd($validator->fail());
    }

    public function change_name(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'fullname' => ['required', 'string', 'max:100'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'        => false,
                'msg'           => 'input salah',
                'access_token'  => null,
                'error'         => $validator->messages(),
            ], 400);
        }
        $id_user = JWTAuth::user()->id;

        $user = User::find($id_user);
        $full_name_arr = explode(" ", $request->input('fullname', ''));

        $user->fullname = $request->fullname;
        $user->name = end($full_name_arr);
        $user->save();

        return response()->json('sukses', 200);
    }
}
