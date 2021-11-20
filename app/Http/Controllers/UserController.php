<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $valid = validator($request->only('email', 'name', 'password'), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($valid->fails()) {
            return response()->json(
                $valid->errors()->all(),
                Response::HTTP_BAD_REQUEST
            );
        }

        $data = $request->all(['name', 'email', 'password']);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return $this->successAuthResponse(
            $user,
            Response::HTTP_ACCEPTED
        );
    }

    private function successAuthResponse(
        User $user,
        int $responseStatus
    ): JsonResponse {
        $token = $user->createToken('myApp')->accessToken;

        return response()->json([
            'meta' => [
                'token' => $token,
            ],
            'user' => $user->toArray()
        ], $responseStatus);
    }

    public function login(): JsonResponse
    {
        $try = Auth::attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if ($try) {
            /** @var User $user */
            $user = Auth::user();

            return $this->successAuthResponse($user, 200);
        }

        return response()->json(['errors' => [
            [
                'status' => '401',
                'title' => 'Unauthenticated',
            ],
        ]], Response::HTTP_UNAUTHORIZED);
    }

    public function logout(Request $request): JsonResponse
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully log out'];
        return response()->json($response, Response::HTTP_OK);
    }

    public function forbidden(): JsonResponse
    {
        return response()->json(
            ['message' => "У вас нет доступа к данной странице"],
            Response::HTTP_FORBIDDEN
        );
    }
}
