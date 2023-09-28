<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *       path="/api/register",
 *       summary="Register",
 *       tags={"Auth"},
 *       @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                    @OA\Schema(
 *                    @OA\Property( property="login", type="string", example="alex"),
 *                    @OA\Property( property="password", type="string", example="qwerty"),
 *                    @OA\Property( property="first_name", type="string", example="Alexandr"),
 *                    @OA\Property( property="last_name", type="string", example="Fedorenko"),
 *                    @OA\Property( property="birthday", type="date", example="01.01.2001"),
 *                    )
 *               }
 *           )
 *        ),
 *        @OA\Response(
 *            response=200,
 *            description="OK",
 *            @OA\JsonContent(
 *                @OA\Property( property="result", type="object",
 *                    @OA\Property( property="token", type="string", example="1|rT3ngvBWTPqWAwmBumUemIHCEswty8UqViFcN7Th209bb8e1"),
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
 *           )
 *       ),
 *
 *
 *
 * @OA\Post(
 *       path="/api/login",
 *       summary="Login",
 *       tags={"Auth"},
 *       @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                    @OA\Schema(
 *                    @OA\Property( property="login", type="string", example="alex"),
 *                    @OA\Property( property="password", type="string", example="qwerty"),
 *                    )
 *               }
 *           )
 *       ),
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *           @OA\JsonContent(
 *               @OA\Property( property="result", type="object",
 *                   @OA\Property( property="token", type="integer", example="1|rT3ngvBWTPqWAwmBumUemIHCEswty8UqViFcN7Th209bb8e1"),
 *               ),
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
 *   ),
 *
 *
 *
 *
 *
 *

 * @OA\Get (
 *           path="/api/users/{user}",
 *           tags={"User"},
 *           @OA\Parameter(
 *               description="ID user",
 *               in="path",
 *               name="user",
 *               required=true,
 *               example=1
 *           ),
 *           @OA\Response(
 *               response=200,
 *               description="OK",
 *               @OA\JsonContent(
 *                   @OA\Property( property="result", type="object",
 *                     @OA\Property( property="id", type="integer", example=1),
 *                     @OA\Property( property="first_name", type="string", example="Alexandr"),
 *                     @OA\Property( property="last_name", type="string", example="Fedorenko"),
 *                     @OA\Property( property="events", type="array", @OA\Items(
 *                        @OA\Property( property="id", type="integer", example=1),
 *                        @OA\Property( property="user_id", type="integer", example=1),
 *                        @OA\Property( property="title", type="string", example="First Event"),
 *                        @OA\Property( property="descr", type="string", example="First Event Description"),
 *                     )
 *                )
 *               ),
 *                   @OA\Property( property="error", type="null", example=null),
 *               )
 *           ),
 *              @OA\Response(
 *              response=500,
 *              description="Internal Server Error",
 *              @OA\JsonContent(
 *                  @OA\Property( property="result", type="object"),
 *                  @OA\Property( property="error", type="string", example="Error"),
 *              )
 *          )
 *     ),
 *
 * @OA\Patch (
 *          security={{"apiAuth":{}}},
 *          path="/api/users/{user}",
 *          tags={"User"},
 *          @OA\Parameter(
 *              description="ID user",
 *              in="path",
 *              name="user",
 *              required=true,
 *              example=1
 *          ),
 *          @OA\RequestBody(
 *              @OA\JsonContent(
 *                  anyOf={
 *                     @OA\Schema(
 *                     @OA\Property( property="login", type="string", example="root"),
 *                     @OA\Property( property="password", type="string", example="qwertyui"),
 *                     @OA\Property( property="first_name", type="string", example="Ivan"),
 *                     @OA\Property( property="last_name", type="string", example="Ivanov"),
 *                     @OA\Property( property="birthday", type="date", example="01.01.2001"),
 *                     )
 *                  }
 *            )
 *         ),
 *          @OA\Response(
 *              response=200,
 *              description="OK",
 *              @OA\JsonContent(
 *                  @OA\Property( property="result", type="array", @OA\Items(
 *                       @OA\Property( property="id", type="integer", example=1),
 *                       @OA\Property( property="user_id", type="integer", example=1),
 *                       @OA\Property( property="title", type="string", example="First Event"),
 *                       @OA\Property( property="descr", type="string", example="First Event Description"),
 *                       @OA\Property( property="birthday", type="date", example="01.01.2001"),
 *                  )
 *              ),
 *                  @OA\Property( property="error", type="null", example=null),
 *              )
 *          ),
 *               @OA\Response(
 *               response=500,
 *               description="Internal Server Error",
 *               @OA\JsonContent(
 *                   @OA\Property( property="result", type="object"),
 *                   @OA\Property( property="error", type="string", example="Error"),
 *               )
 *           )
 *      ),
 *
 * @OA\Delete ( security={{"apiAuth":{}}}, path="/api/users/{user}", tags={"User"},
 *          @OA\Parameter( description="ID User", in="path", name="user", required=true, example=1),
 *         @OA\Response (response=204, description="No Content"),
 *         @OA\Response (response=500, description="Internal Server Error", @OA\JsonContent(
 *                   @OA\Property( property="result", type="object"),
 *                   @OA\Property( property="error", type="string", example="Error"),
 *               )
 *          )
 *      )
 */
class UserController extends Controller
{
    //
}
