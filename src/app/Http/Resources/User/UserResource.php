<?php

namespace App\Http\Resources\User;

use App\Models\User;

class UserResource extends UserMinResource
{
    public function toArray($request)
    {
        /** @var User|self $this */
        return array_merge(parent::toArray($request), [
            'phone' => $this->phone,
            'email' => $this->email,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ]);
    }
}
