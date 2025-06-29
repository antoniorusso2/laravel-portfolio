<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasModelRoutes
{
    public function getShowRoute(Model $model)
    {
        $name = class_basename($model);

        $routeName = strtolower(Str::plural($name)) . '.show';

        return route($routeName, $model);
    }
}
