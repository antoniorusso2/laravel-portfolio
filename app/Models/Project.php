<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'url'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public static function generateSlug($name)
    {
        return 'ntn-rss-' . str_replace(' ', '-', strtolower($name));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
