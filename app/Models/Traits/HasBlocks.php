<?php

namespace App\Models\Traits;

/**
 * Blockable
 */
trait HasBlocks
{
    public function getBlocks()
    {
        return $this->blocks;
    }

    public function renderFields($renderType, $type, array $params)
    {
        return view($renderType .'.'. $type, $params);
    }

    public function blocks()
    {
        return $this->morphToMany('App\Models\Block', 'blockable');
    }

    public function renderBlock($type, $data)
    {

        if(class_exists($type)){
            $app = app($type);
            return $app->findOrFail($data)->render();
        } else {
            return view('blocks.'. $type, [
                'data' => $data
            ]);
        }
    }
}

