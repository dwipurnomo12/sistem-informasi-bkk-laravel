<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Informasi extends Model
{
    use HasFactory, Sluggable;
    
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }


}


