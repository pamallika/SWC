<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Models\Event;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event::all();
    }

    public function store(StoreEventRequest $request): Event
    {
        $data = $request->validated();
        return Event::create($data);
    }
    public function show(Event $event)
    {
        return $event;
    }

    public function update(UpdateEventRequest $request, Event $event): Event
    {
        $data = $request->validated();
        $event = $event->update($data);
        return new Event($event);
    }

    public function destroy(Event $event)
    {
        $event->deleteOrFail();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
