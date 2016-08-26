<?php
use App\Moodboard;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::auth();
Route::resource('user.moodboard', 'MoodboardController');
Route::resource('user.moodboard.category', 'CategoryController');
Route::get('/home', 'HomeController@index');
Route::post('/palette', function () {
  //dd(request()->all());
  $settings =  json_encode(
    request()->all()
  );
  return  Moodboard::find('17')->categories()->updateExistingPivot('1', ['settings'=> $settings]);

});

Route::get('/palette', function () {
  //dd(request()->all());
  $data = Moodboard::find('17')->categories()->where('category_id', '1')->first()->pivot->settings;
  $settings =  $data;
  return  $settings;

});
