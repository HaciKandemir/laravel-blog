<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Kategori extends Model
{
    use Sluggable;
    protected $table = "kategoriler";

    protected $fillable = ["baslik","slug"];

    protected $appends = ["thumb_resim"];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'baslik'
            ]
        ];
    }

    public function resim()
    {
        return $this->morphOne("App\Resim","imageable");
    }

    public function getThumbResimAttribute()
    {
        if($this->resim)
        {
            return asset("uploads/thumb/thumb_".$this->resim()->first()->name);
        }
    }
}
