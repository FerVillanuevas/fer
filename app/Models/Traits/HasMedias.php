<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Storage;

use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;

trait HasMedias
{
    public function getPath()
    {

        return $this->path;
    }

    public function getImage()
    {
        $driver = Storage::disk('public')->getDriver();
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $driver,
            'cache' =>  $driver,
            'cache_path_prefix' => '.cache',
            'base_url' => 'img',
        ]);
        $params = array_filter([
            'h' => $this->pivot->h,
            'w' => $this->pivot->w,
            'crop' => $this->pivot->crop,
            'flip' => $this->pivot->flip
        ]);
        $base64 = $server->getImageAsBase64($this->getPath(), $params);

        return $base64;
    }

    public function render(String $class)
    {
        $driver = Storage::disk('public')->getDriver();
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $driver,
            'cache' =>  $driver,
            'cache_path_prefix' => '.cache',
            'base_url' => 'img',
        ]);

        $base64 = $server->getImageAsBase64($this->getPath(), []);

        return \view('components.image', \compact('base64', 'class'));
    }

    public function original()
    {
        $driver = Storage::disk('public')->getDriver();
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $driver,
            'cache' =>  $driver,
            'cache_path_prefix' => '.cache',
            'base_url' => 'img',
        ]);

        $base64 = $server->getImageAsBase64($this->getPath(), []);

        return $base64;
    }

    public function medias()
    {
        return $this->morphToMany('App\Models\Media', 'mediables')
            ->withPivot([
                'crop',
                'h',
                'w',
                'flip',
            ]);
    }
}
