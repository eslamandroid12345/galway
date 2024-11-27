<?php

use App\Http\Controllers\Api\V1\About\AboutController;
use App\Http\Controllers\Api\V1\Article\ArticleController;
use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Calender\CalenderController;
use App\Http\Controllers\Api\V1\CenterNew\CenterNewController;
use App\Http\Controllers\Api\V1\CenterProgramme\CenterProgrammeController;
use App\Http\Controllers\Api\V1\CenterPublication\CenterPublicationController;
use App\Http\Controllers\Api\V1\Contact\ContactController;
use App\Http\Controllers\Api\V1\Home\HomeController;
use App\Http\Controllers\Api\V1\Paper\PaperController;
use App\Http\Controllers\Api\V1\Structure\HeaderFooterController;
use App\Http\Controllers\Api\V1\Topic\TopicController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function () {
    Route::group(['prefix' => 'sign'], function () {
        Route::post('in', 'signIn');
        Route::post('up', 'signUp');
        Route::post('out', 'signOut');
    });
    Route::get('what-is-my-platform', 'whatIsMyPlatform'); // returns 'platform: website!'
});
Route::group(['prefix' => 'home'], function () {
    Route::get('header-footer', HeaderFooterController::class);
    Route::post('contact-us', ContactController::class);
    Route::get('/', HomeController::class)->middleware('visitor');
});
Route::group(['prefix' => 'about', 'controller' => AboutController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::get('/administrative/{id}', 'getAdministrative');
    Route::get('/single/{id}', 'getOne');
});
Route::group(['prefix' => 'center-programmes', 'controller' => CenterProgrammeController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::get('symposiums/{id}', 'showSymposium');
});
Route::group(['prefix' => 'center-news', 'controller' => CenterNewController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});
Route::group(['prefix' => 'topics', 'controller' => TopicController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});
Route::group(['prefix' => 'articles', 'controller' => ArticleController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});
Route::group(['prefix' => 'papers', 'controller' => PaperController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});
Route::group(['prefix' => 'center-publications', 'controller' => CenterPublicationController::class], function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
});
Route::group(['prefix' => 'calenders', 'controller' => CalenderController::class], function () {
    Route::get('/', 'index');
});
