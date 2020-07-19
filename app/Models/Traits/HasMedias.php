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

    private function server($type, array $params = [])
    {
        $driver = Storage::disk('public')->getDriver();
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $driver,
            'cache' =>  $driver,
            'cache_path_prefix' => '.cache',
            'base_url' => 'img',
        ]);

        return $server->$type($this->getPath(), $params);


    }

    public function getImage()
    {
        $params = array_filter([
            'h' => $this->pivot->h,
            'w' => $this->pivot->w,
            'crop' => $this->pivot->crop,
            'flip' => $this->pivot->flip
        ]);

        return $this->server('getImageAsBase64', $params);
    }

    public function original()
    {
        return $this->server('getImageAsBase64');
    }

    public function render()
    {
        return view('blocks.media', [
            'url' => $this->original(),
        ]);
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
