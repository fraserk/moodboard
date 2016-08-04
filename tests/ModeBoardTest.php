<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Moodboard;

class ModeBoardTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * Logged in user can create new moodboard.
     *
     * @return void
     */
    public function test_can_create_moodboard()
    {
        $user = factory(User::class)->create();
        $moodboard = factory(Moodboard::class)->make();
        $user->CreateMoodBoard($moodboard);
        $this->seeInDatabase('Moodboards', ['name'=> $moodboard->name]);
    }
}
