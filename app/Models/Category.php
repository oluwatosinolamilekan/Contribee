<?php

namespace App\Models;

use App\Traits\ModelScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory,ModelScope;

    protected $table = 'content_categories';
}
