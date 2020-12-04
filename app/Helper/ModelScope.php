<?php

namespace App\Helper;

class ModelScope
{
    public function scopeFeature($query,$type)
    {
        return $query->where('featured',$type);
    }
}
