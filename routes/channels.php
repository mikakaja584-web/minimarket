<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;

Broadcast::channel('user.{id}', function (User $user, int $id) {
    return (int) $user->id === $id;
});