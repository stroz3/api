<?php

namespace App\Services;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Sanctum\NewAccessToken;

class PersonalAccessTokenService
{
    /**
     * @param Request $request
     * @param Authenticatable $authenticatable
     * @return NewAccessToken
     */
    public function generate(Request $request, Authenticatable $authenticatable): NewAccessToken
    {
        $tokenName = Str::substr($request->userAgent(), 0, 230) . '|' . $request->ip();
        $authenticatable->tokens()->where('name', $tokenName)->delete();
        return $authenticatable->createToken($tokenName);
    }
}
