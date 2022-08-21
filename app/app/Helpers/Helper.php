<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class Helper {

    public static function currentRoute() {
        return Route::currentRouteName();
    }

}
