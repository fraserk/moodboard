<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PrimaryPivot;

class Moodboard extends Model
{
    protected $fillable = ['name'];
    protected $casts= [
      'categories.pivot.settings'=>'array'
    ];

    public function newPivot(Model $parent, array $attributes, $table, $exists)
    {
        return new PrimaryPivot($parent, $attributes, $table, $exists);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_moodboard')->withPivot('settings');
    }
}
