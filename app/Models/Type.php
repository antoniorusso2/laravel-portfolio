<?php

namespace App\Models;

use App\Traits\HasModelRoutes;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasModelRoutes;
    // definizione di relazioni
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
