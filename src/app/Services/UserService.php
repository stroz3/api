<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(array $requestData): User
    {
        $user = User::make([
            'name' => $requestData['name'],
            'surname' => $requestData['surname'],
            'phone' => $requestData['phone'],
            'patronymic' => $requestData['patronymic'] ?? null,
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),
        ]);
        $user->saveOrFail();
        return $user;
    }
}
