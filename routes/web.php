<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' =>'auth'],function(){
    Route::get('dashboard','HomeController@dashboard')->name('dashboard');
});

Route::group(['middleware' =>'role:editor'],function(){
    Route::get('role',function(){

    });
});

Route::get('/post','HomeController@postPage');
Route::post('post','HomeController@postData');
