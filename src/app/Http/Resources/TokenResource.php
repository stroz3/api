<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Laravel\Sanctum\NewAccessToken;

class TokenResource extends JsonResource
{
    public static $wrap = '';

    public function toArray($request)
    {
        /** @var NewAccessToken|self $this */
        return [
            'token' => $this->plainTextToken,
            'token_type' => 'Bearer',
        ];
    }
}
