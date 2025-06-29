<?php

namespace App\Models;

use App\Traits\HasModelRoutes;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasModelRoutes;
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
