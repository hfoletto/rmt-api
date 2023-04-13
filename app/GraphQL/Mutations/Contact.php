<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact as ContactMail;

final class Contact
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if (!$contact_recipient = config('mail.contact_recipient')) {
            return false;
        }

        Mail::to($contact_recipient)
            ->send(new ContactMail(
                name: Arr::get($args, 'name'),
                phone_number: Arr::get($args, 'phone_number'),
                email: Arr::get($args, 'email'),
                message: Arr::get($args, 'message'),
            ));

        return true;
    }
}
