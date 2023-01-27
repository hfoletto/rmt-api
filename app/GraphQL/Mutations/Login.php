<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\SafeGraphQLException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

final class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     *
     * @throws SafeGraphQLException
     */
    public function __invoke($_, array $args)
    {
        $guard = Auth::guard('web');

        if (! $guard->attempt($args)) {
            throw new SafeGraphQLException(
                'Invalid credentials'
            );
        }

        /**
         * Since we successfully logged in, this can no longer be `null`.
         *
         * @var User $user
         */
        $user = $guard->user();

        return $user;
    }
}
