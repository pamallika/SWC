<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\PublicFieldsUserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function App\Helpers\serverErrorResponse;
use function App\Helpers\swcResponse;

class UserController extends Controller
{
    /**
     * @param \App\Http\Requests\User\LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json('Credentials not match', 401);
        }

        /** @var User $user */
        $user = $request->user();
        try {
            $token = $user->createToken('api')->plainTextToken;
        } catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }
        return swcResponse(['token' => $token]);
    }
    public function getAuthUser(): JsonResponse
    {
        return swcResponse(PublicFieldsUserResource::make(Auth::user())->toArray());
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $user = User::create($request->validated());
        } catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }
        return swcResponse(['token' => $user->createToken('api')->plainTextToken]);
    }

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return swcResponse(PublicFieldsUserResource::make($user)->toArray());
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        try {
            $user->update($request->validated());
        } catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }
        return swcResponse($user->toArray());

    }

    /**
     * @param User $user
     * @return JsonResponse
     * @throws \Throwable
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            $user->deleteOrFail();
        } catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }
        return swcResponse([], ResponseAlias::HTTP_NO_CONTENT);
    }
}
