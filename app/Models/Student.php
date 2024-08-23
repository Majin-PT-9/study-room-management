<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes,Sluggable;


    public function assembly(){
        return $this->belongsTo(Assembly::class);
    }

    public function grade(){
        return $this->belongsTo(Grade::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name'],
                'onUpdate' => true,
                'unique' => true,
            ]
        ];
    }
}
