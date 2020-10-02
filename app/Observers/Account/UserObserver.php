<?php

namespace App\Observers\Account;

use App\Models\Account\UserModel;

use App\Notifications\Users\UserCreated;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\Account\UserModel  $user
     * @return void
     */
    public function created(UserModel $user)
    {
        $user->notify(new UserCreated($user));
    }
}
