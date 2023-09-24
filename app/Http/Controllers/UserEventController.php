<?php

namespace App\Http\Controllers;

use App\Models\UserEvent;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserEventController extends Controller
{
    public function store(Request $request): UserEvent
    {
        $data = $request->all();
        return UserEvent::create($data);
    }

    public function destroy(UserEvent $userEvent): ResponseAlias
    {
        $userEvent->deleteOrFail();
        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
