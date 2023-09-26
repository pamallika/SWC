<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BasicApiResource extends JsonResource
{
    public static $wrap = null;
    public function __construct($resource, string $error = null)
    {
        $this->resource = $resource;
        $this->error = $error;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'result' => $this->resource ?? []
        ];
    }
    public function with($request)
    {
        return [
            "error" => $this->error,
        ];
    }
}
