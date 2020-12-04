<?php

namespace App\Traits;

trait ModelsScope
{
    public function scopeFeature($query,$type)
    {
        return $query->where('featured',$type);
    }
}
