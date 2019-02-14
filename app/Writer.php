<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $fillable = [
        "name",
        "age",
        "username",
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->wherePublished(true);
    }

}
