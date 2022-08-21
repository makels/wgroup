<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class Helper {

    public static function getRoleName(int $role_id) {
        switch ($role_id) {
            case 0:
                return __("Writer");
            case 1:
                return __("Administrator");
            case 2:
                return __("Moderator");
            default:
                return __("Guest");
        }
    }

    public static function currentRoute() {
        return Route::currentRouteName();
    }

}
