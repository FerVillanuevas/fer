<?php

namespace App\Models;

use App\Models\Traits\HasMedias;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasMedias;

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
