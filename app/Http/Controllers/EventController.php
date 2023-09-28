<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Http\Resources\ShowEventResource;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
        return swcResponse(ShowEventResource::collection(Event::all())->resolve());
    }

    public function store(StoreEventRequest $request): JsonResponse
    {
        $data = $request->validated();
        try {
            $event = Event::create($data);
        } catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }
        return swcResponse($event->toArray());
    }

    public function show(Event $event): JsonResponse
    {
        return swcResponse((ShowEventResource::make($event))->toArray());
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
        if ($event->getAttribute('user_id') !== Auth::user()->id) {
            return swcResponse([], ResponseAlias::HTTP_FORBIDDEN, 'access denied');
        }
        try {
            $event->deleteOrFail();
        } catch (\Throwable $error) {
            return serverErrorResponse($error->getMessage());
        }
        return swcResponse([], ResponseAlias::HTTP_NO_CONTENT);
    }
}
