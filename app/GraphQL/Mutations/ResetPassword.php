<?php

namespace App\GraphQL\Mutations;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

final class ResetPassword
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            [
                'email' => Arr::get($args, 'email'),
                'password' => Arr::get($args, 'password'),
                'password_confirmation' => Arr::get($args, 'password_confirmation'),
                'token' => Arr::get($args, 'token'),
            ],
            function ($user) use ($args) {
                $user->forceFill([
                    'password' => Hash::make(Arr::get($args, 'password')),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status != Password::PASSWORD_RESET) {
            throw ValidationException::withMessages([
                'email' => [__($status)],
            ]);
        }

        return __($status);
    }
}
