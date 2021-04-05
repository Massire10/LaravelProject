<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth_repository;

    public function __construct(AuthRepository $auth_repository)
    {
        $this->auth_repository = $auth_repository;
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     *
     * POST
     * login
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request)
    {
        try {
            return $this->auth_repository->login($request);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()],404);
        }
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
    public function register(RegisterRequest $request)
    {

        try {
            return $this->auth_repository->register($request);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()],404);
        }
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
        try {
            $this->auth_repository->logout();
            return response()->json(['message' => 'User logged out successfully']);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()],404);
        }
    }


    public function profile()
    {
        try {
            return $this->auth_repository->profile();
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'message' => $exception->getMessage()],404);
        }
    }
}
