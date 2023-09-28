<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *      path="/api/events",
 *      summary="Create Event",
 *      tags={"Event"},
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                   @OA\Schema(
 *                   @OA\Property( property="user_id", type="integer"),
 *                   @OA\Property( property="title", type="string"),
 *                   @OA\Property( property="descr", type="string"),
 *                   example={"user_id": 1, "title": "First Event", "descr": "First Event Description"}
 *                   )
 *              }
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property( property="result", type="object",
 *                  @OA\Property( property="id", type="integer", example=1),
 *                  @OA\Property( property="user_id", type="integer", example=1),
 *                  @OA\Property( property="title", type="string", example="First Event"),
 *                  @OA\Property( property="descr", type="string", example="First Event Description"),
 *              ),
 *              @OA\Property( property="error", type="null", example=null),
 *          )
 *      ),
 *           @OA\Response(
 *           response=500,
 *           description="Internal Server Error",
 *           @OA\JsonContent(
 *               @OA\Property( property="result", type="object"),
 *               @OA\Property( property="error", type="string", example="Error"),
 *           )
 *       )
 *  )
 *
 * @OA\Get (
 *       security={{"apiAuth":{}}},
 *       path="/api/events",
 *       summary="Get all Events",
 *       tags={"Event"},
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *           @OA\JsonContent(
 *               @OA\Property( property="result", type="array", @OA\Items(
 *                    @OA\Property( property="id", type="integer", example=1),
 *                    @OA\Property( property="user_id", type="integer", example=1),
 *                    @OA\Property( property="title", type="string", example="First Event"),
 *                    @OA\Property( property="descr", type="string", example="First Event Description"),
 *               )
 *           ),
 *               @OA\Property( property="error", type="null", example=null),
 *           )
 *       ),
 *            @OA\Response(
 *            response=500,
 *            description="Internal Server Error",
 *            @OA\JsonContent(
 *                @OA\Property( property="result", type="object"),
 *                @OA\Property( property="error", type="string", example="Error"),
 *            )
 *        )
 *   )
 *
 * @OA\Get (
 *        path="/api/events/{event}",
 *        summary="Get single Event by id",
 *        tags={"Event"},
 *        @OA\Parameter(
 *            description="ID event",
 *            in="path",
 *            name="event",
 *            required=true,
 *            example=1
 *        ),
 *        @OA\Response(
 *            response=200,
 *            description="OK",
 *            @OA\JsonContent(
 *                @OA\Property( property="result", type="array", @OA\Items(
 *                     @OA\Property( property="id", type="integer", example=1),
 *                     @OA\Property( property="user_id", type="integer", example=1),
 *                     @OA\Property( property="title", type="string", example="First Event"),
 *                     @OA\Property( property="descr", type="string", example="First Event Description"),
 *                )
 *            ),
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
 *    )
 *
 * @OA\Patch (
 *         path="/api/events/{event}",
 *         summary="Patch Event by id",
 *         tags={"Event"},
 *         @OA\Parameter(
 *             description="ID event",
 *             in="path",
 *             name="event",
 *             required=true,
 *             example=1
 *         ),
 *         @OA\RequestBody(
 *             @OA\JsonContent(
 *                 anyOf={
 *                    @OA\Schema(
 *                    @OA\Property( property="title", type="string"),
 *                    @OA\Property( property="descr", type="string"),
 *                    example={"title": "First Event", "descr": "First Event Description"}
 *                    )
 *                 }
 *           )
 *        ),
 *         @OA\Response(
 *             response=200,
 *             description="OK",
 *             @OA\JsonContent(
 *                 @OA\Property( property="result", type="array", @OA\Items(
 *                      @OA\Property( property="id", type="integer", example=1),
 *                      @OA\Property( property="user_id", type="integer", example=1),
 *                      @OA\Property( property="title", type="string", example="First Event"),
 *                      @OA\Property( property="descr", type="string", example="First Event Description"),
 *                 )
 *             ),
 *                 @OA\Property( property="error", type="null", example=null),
 *             )
 *         ),
 *              @OA\Response(
 *              response=500,
 *              description="Internal Server Error",
 *              @OA\JsonContent(
 *                  @OA\Property( property="result", type="object"),
 *                  @OA\Property( property="error", type="string", example="Error"),
 *              )
 *          )
 *     )
 *
 * @OA\Delete (
 *         path="/api/events/{event}",
 *         summary="Delete Event by id",
 *         tags={"Event"},
 *         @OA\Parameter(
 *             description="ID event",
 *             in="path",
 *             name="event",
 *             required=true,
 *             example=1
 *         ),
 *         @OA\Response(
 *             response=204,
 *             description="No Content",
 *             )
 *         ),
 *              @OA\Response(
 *              response=500,
 *              description="Internal Server Error",
 *              @OA\JsonContent(
 *                  @OA\Property( property="result", type="object"),
 *                  @OA\Property( property="error", type="string", example="Error"),
 *              )
 *          )
 *     )
 */
class EventController extends Controller
{
    //
}
