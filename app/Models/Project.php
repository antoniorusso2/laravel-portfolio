<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // protected $fillable = ['name', 'slug', 'description'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }

    public static function generateSlug($name)
    {
        return 'ntn-rss-' . str_replace(' ', '-', strtolower($name));
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
