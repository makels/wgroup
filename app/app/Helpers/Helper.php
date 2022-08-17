<?php
namespace App\Helpers;

class Helper {

    public static function getRoleName(int $role_id) {
        switch ($role_id) {
            case 0:
                return __("Member");
            case 1:
                return __("Administrator");
            case 2:
                return __("Moderator");
            default:
                return __("Guest");
        }
    }



}
