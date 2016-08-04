<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Use have Many MoodBoards
     */
    public function moodboard()
    {
        return $this->hasmany(Moodboard::class);
    }

    /**
     * User Create MoodBoards
     */
    public function CreateMoodBoard($request, $catID)
    {
        $moodboard =  $this->moodboard()->create([
          'name' => $request->name
        ]);
        $moodboard->categories()->attach($catID);
        return $moodboard;
    }
}
