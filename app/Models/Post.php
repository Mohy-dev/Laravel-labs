<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ["info", "injection", "_token"];

    function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'posts' => 'title'
            ]
        ];
    }
}
