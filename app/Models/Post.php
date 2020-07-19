<?php

namespace App\Models;

use App\Models\Traits\HasBlocks;
use App\Models\Traits\HasMedias;
use App\View\Components\PostCard;
use App\View\Components\TextField;
use App\View\Components\MediaField;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasMedias, HasBlocks;

    protected $fillable = [
        'name'
    ];

    protected $blocks = [
        'text' => [
            'name' => 'name',
            'placeholder' => 'Post title'
        ],
        'media' => [
            'name' => 'cover',
            'height' => 500,
            'widht' => 500
        ]
    ];

    private $types = [
        'card' => [
            'fields' => [
                'cover',
                'title',
                'extract',
                'slug'
            ],
            'template' => PostCard::class
        ]
    ];

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

}
