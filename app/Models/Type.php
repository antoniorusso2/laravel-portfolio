<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // definizione di relazioni
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
