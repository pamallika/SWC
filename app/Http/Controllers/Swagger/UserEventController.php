<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *        path="/api/user-event",
 *        summary="Login",
 *        tags={"UserEvent"},
 *        @OA\RequestBody(
 *            @OA\JsonContent(
 *                allOf={
 *                     @OA\Schema(
 *                     @OA\Property( property="user_id", type="int", example=1 ),
 *                     @OA\Property( property="event_id", type="int", example=1 ),
 *                     )
 *                }
 *            )
 *        ),
 *        @OA\Response(
 *            response=200,
 *            description="OK",
 *            @OA\JsonContent(
 *                @OA\Property( property="result", type="object",
 *                    @OA\Property(property="id", type="integer", example=1),
 *                    @OA\Property(property="user_id", type="integer", example=1),
 *                    @OA\Property(property="event_id", type="integer", example=1)
 *                ),
 *                @OA\Property( property="error", type="null", example=null),
 *            )
 *        ),
 *             @OA\Response(
 *             response=500,
 *             description="Internal Server Error",
 *             @OA\JsonContent(
 *                 @OA\Property( property="result", type="object"),
 *                 @OA\Property( property="error", type="string", example="Error"),
 *             )
 *         )
 *    ),
 *
 *
 * @OA\Delete ( security={{"apiAuth":{}}}, path="/api/user-event/{relationId}", tags={"UserEvent"},
 *           @OA\Parameter( description="relationId", in="path", name="relationId", required=true, example=1),
 *          @OA\Response (response=204, description="No Content"),
 *          @OA\Response (response=500, description="Internal Server Error", @OA\JsonContent(
 *                    @OA\Property( property="result", type="object"),
 *                    @OA\Property( property="error", type="string", example="Error"),
 *                )
 *           )
 *       )
 */

class UserEventController extends Controller
{
    //
}
