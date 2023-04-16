<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

final class CreateUser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = User::create([
            'name' => Arr::get($args, 'name'),
            'email' => Arr::get($args, 'email'),
            'password' => Hash::make(Arr::get($args, 'password')),
        ]);

        Auth::login($user);

        return $user;
    }
}
