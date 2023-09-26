<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEvent\StoreUserEventRequest;
use App\Models\UserEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function App\Helpers\serverErrorResponse;
use function App\Helpers\swcResponse;

class UserEventController extends Controller
{
    public function store(StoreUserEventRequest $request): JsonResponse
    {
        $data = $request->validated();
        try {
            $userEvent = UserEvent::firstOrCreate($data);
            return swcResponse($userEvent->toArray());
        } catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }
    }

    public function destroy(UserEvent $userEvent): ResponseAlias
    {
        try {
            $userEvent->deleteOrFail();
        } catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }
        return swcResponse([], ResponseAlias::HTTP_NO_CONTENT);
    }
}
