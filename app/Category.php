<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PrimaryPivot;

class Category extends Model
{
    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        return new PrimaryPivot($parent, $attributes, $table, $exists);
    }
    /**
        *
       */
     public function moodboards()
     {
         return $this->belongsToMany(Moodboard::class);
     }
}
