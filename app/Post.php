<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "title",
        "image",
        "content",
        "writer_id",
    ];

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }
}
