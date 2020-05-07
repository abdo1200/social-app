<?php

use App\Events\Notifications;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'HomeController@view')->name('viewprofile');
Route::get('/edit', 'HomeController@edit')->name('editprofile');
Route::put('/update', 'HomeController@update')->name('updateprofile');

Route::get('/friends', 'FriendController@index')->name('friends');
Route::put('/add/{id}', 'FriendController@store')->name('addfriend');
Route::put('/accept/{id}', 'FriendController@accept')->name('accept');
// Route::get('/test', 'HomeController@test')->name('test');
Route::put('/', 'PostController@store')->name('creatpost');
Route::delete('/delete/{id}', 'PostController@destroy')->name('deletepost');
Route::put('/{id}', 'commentController@store')->name('Addcomment');
Route::put('/like/{id}', 'LikeController@store')->name('Addlike');


// Route::get('/test', function () {
//     event(new Notifications('test'));
//     return view('test');
// });
// Route::get('/test2', function () {

//     return view('test2');
// });
