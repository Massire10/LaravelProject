<?php

namespace App\Repositories;

use App\Mail\VerificationNotifyMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthRepository
{
    public function __construct()
    {}

    /**
     *
     * POST
     * login
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $request = $request->request->all();

        $token_validity = $request['remember_me'] ? (24 * 60 * 30) : (24 * 60);

        array_pop($request);

        $this->guard()->factory()->setTTL($token_validity);

        if (!$token = $this->guard()->attempt($request)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @param $email
     * @return mixed
     */
    private function is_email_exist($email){
        return User::where('email', $email)->exists();
    }

    /**
     *
     * POST
     * register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register($request, $is_from_api = false)
    {
        $user = User::create(
            array_merge(
                $is_from_api ? $request : $request->request->all(),
                ['password' => bcrypt($request['password'])]
            )
        );

        Mail::to($user->email)->send(new VerificationNotifyMail($user));

        if (Mail::failures()) {
            return response()->json(['message' => 'failures']);
        }

        return $user;
    }

    /**
     *
     * POST
     * logout
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'User logged out successfully']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json(
            [
                'token'          => $token,
                'token_type'     => 'bearer',
                'token_validity' => ($this->guard()->factory()->getTTL() * 60),
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
