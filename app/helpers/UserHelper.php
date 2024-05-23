<?php

namespace App\Helpers;

class UserHelper
{
    public static function addPoint($user, $point)
    {
        $user->rank_point += $point;
        $user->save();
    }
}
