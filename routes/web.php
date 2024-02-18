<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CardsController;
use App\Models\User;

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

//Route::get('about', function () {
//    $people = ['Amin', 'Ali', 'Mahdi'];
//    return view('about', ['people'=>$people]);
//});

Route::get('about', [PagesController::class,'home']);
Route::get('contact', [PagesController::class,'contact']);
Route::get('exception', [PagesController::class,'exception']);

Route::get('cards', [CardsController::class,'index'])->name('Cards');
Route::get('cards/{card}', [CardsController::class,'show']);
Route::post('add-card', [CardsController::class,'add_card']);
Route::get('editCard/{card}', [CardsController::class,'editCard']);
Route::patch('updateCard/{card}', [CardsController::class,'updateCard']);

Route::group(['prefix'=>'amin'], function() {
    Route::get('hello', ['as'=>'Hello', function() {
        return 'Hello';
    }]);
});

Route::get('user/{user}', function ($user) {
    return (DB::table('users')->where('username', '=', $user)->first());
});

Route::get('api/{param}', function ($param) {
   return ['result' => $param];
})->middleware('throttle:3');

Route::group(['prefix'=>'api', 'middleware'=>'auth:api'], function () {
    Route::get('user/{user}', function (User $user) {
        return $user;
    });
});

//dd(route('Hello'));
