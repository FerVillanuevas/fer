<?php

namespace App\Models;

use App\Models\Traits\HasMedias;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasMedias;

    protected $guarded = [];
}
