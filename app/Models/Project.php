<?php

namespace App\Models;

use App\Traits\HasModelRoutes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'customer', 'type_id'];

    use HasModelRoutes;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }


    public function media()
    {
        return $this->hasMany(Media::class);
    }

    //imposta slug come valore di riferimento quando si effettua una query per questo modello.
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //genera slug per ogni progetto
    public static function generateSlug($name)
    {
        return 'ntn-rss-' . str_replace(' ', '-', strtolower($name));
    }
}
