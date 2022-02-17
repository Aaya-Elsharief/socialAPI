<?php

use App\Http\Controllers\Api\Auth\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Social\SocialController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//define('PAGINATION_COUNT',2);

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('register', [RegisterController::class, 'register']);
Route::get('sendMail',[VerificationController::class,'mailSend']);

Route::group(['middleware'=>'auth:api'],function() {
    Route::post('logout', [LogoutController::class, 'logout']);
    Route::post('user', [SocialController::class, 'user']);
    Route::get('user-friends/{user_id?}',[SocialController::class,'userFriends']);
    Route::post('user-favourite-post/{user_id?}',[SocialController::class,'userFavouritePost']);
    Route::get('profile/{user_id?}',[SocialController::class,'profile']);
    Route::get('timeline',[SocialController::class,'timeline']);
//    Route::post('user-home/{user_id?}',[SocialController::class,'userHome']);



});

Route::group(['middleware'=>'api'],function() {
    Route::post('user-home/{user_id?}',[SocialController::class,'userHome']);
    Route::get('post-page/{post_id}',[SocialController::class,'postPage']);

});

