<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * @param route string -> index, show, edit
 */
trait HasModelRoutes
{
    public function getRoute(string $route): string
    {
        $allowed = [
            'index',
            'show',
            'edit'
        ];

        if (!in_array($route, $allowed)) {
            return "route not allowed";
        }

        $name = class_basename($this);
        $complete_route = strtolower(Str::plural($name)) . ".$route";

        return route($complete_route, $this);
    }
}
