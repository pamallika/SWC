<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function App\Helpers\serverErrorResponse;
use function App\Helpers\swcResponse;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return swcResponse(Event::all()->toArray());
    }

    public function store(StoreEventRequest $request): JsonResponse
    {
        $data = $request->validated();
        try {
            $event = Event::create($data);
            return swcResponse($event->toArray());
        }catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }

    }

    public function show(Event $event): JsonResponse
    {
        return swcResponse($event->toArray());
    }

    public function update(UpdateEventRequest $request, Event $event): JsonResponse
    {
        $data = $request->validated();
        try {
            $event->update($data);
        } catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }
        return swcResponse($event->toArray());
    }

    public function destroy(Event $event): JsonResponse
    {
        if ($event->getAttribute('creator_id') !== Auth::user()->id) {
            return swcResponse([], ResponseAlias::HTTP_FORBIDDEN, 'access denied');
        }
        try {
            $event->deleteOrFail();
        }catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }
        return swcResponse([], ResponseAlias::HTTP_NO_CONTENT);
    }
}
