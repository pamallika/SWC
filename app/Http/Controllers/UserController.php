<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\PublicFieldsUserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    /**
     * @param \App\Http\Requests\User\LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json('Credentials not match', 401);
        }

        /** @var User $user */
        $user = $request->user();
        $token = $user->createToken('api')->plainTextToken;
        return response()->json(['token' => $token]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        return view('index', $user->toArray());
    }
    /**
     * @param \App\Http\Requests\User\RegisterRequest $request
     * @return mixed
     */
    public function store(RegisterRequest $request): User
    {
        $user = User::create($request->validated());
        return new User($user);
    }

    /**
     * @param User $user
     * @return PublicFieldsUserResource
     */
    public function show(User $user): PublicFieldsUserResource
    {
        return PublicFieldsUserResource::make($user);
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return User
     */
    public function update(UpdateUserRequest $request, User $user): User
    {
        $user->update($request->validated());
        return $user;
    }

    /**
     * @param User $user
     * @return Response
     * @throws \Throwable
     */
    public function destroy(User $user): Response
    {
        $user->deleteOrFail();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
