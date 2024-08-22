<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

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
