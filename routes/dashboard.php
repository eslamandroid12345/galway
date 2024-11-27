<?php

use App\Http\Controllers\Dashboard\About\AboutController;
use App\Http\Controllers\Dashboard\Article\ArticleController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Calender\CalenderController;
use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\CenterNews\CenterNewsController;
use App\Http\Controllers\Dashboard\CenterProgramme\CenterProgrammeController;
use App\Http\Controllers\Dashboard\CenterPublication\CenterPublicationController;
use App\Http\Controllers\Dashboard\Contact\ContactController;
use App\Http\Controllers\Dashboard\Home\HomeController;
use App\Http\Controllers\Dashboard\Lecture\LectureController;
use App\Http\Controllers\Dashboard\Mangers\MangerController;
use App\Http\Controllers\Dashboard\MapCenter\MapCenterController;
use App\Http\Controllers\Dashboard\Member\MemberController;
use App\Http\Controllers\Dashboard\Program\ProgramController;
use App\Http\Controllers\Dashboard\Roles\RoleController;
use App\Http\Controllers\Dashboard\ScientificPaper\ScientificPaperController;
use App\Http\Controllers\Dashboard\Session\SessionController;
use App\Http\Controllers\Dashboard\Settings\SettingController;
use App\Http\Controllers\Dashboard\Structure\HeaderFooter\HeaderFooterController;
use App\Http\Controllers\Dashboard\Structure\Home\HomeContentController;
use App\Http\Controllers\Dashboard\Symposium\SymposiumController;
use App\Http\Controllers\Dashboard\TreeStructure\TreeStructureController;
use App\Http\Controllers\Dashboard\User\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {
    Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', [AuthController::class, '_login'])->name('_login');

        Route::post('login', [AuthController::class, 'login'])->name('login');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('/');
//        Route::resource('users', UserController::class);

        Route::post('update-password', [SettingController::class, 'updatePassword'])->name('update-password');
        Route::resource('roles', RoleController::class);
        Route::get('role/{id}/managers', [RoleController::class, 'mangers'])->name('roles.mangers');
        Route::get('center-programmes/{id}/programs', [CenterProgrammeController::class, 'programs'])->name('programs.index');
        Route::get('center-programmes/{id}/programs/create', [ProgramController::class, 'create'])->name('programs.create');
        Route::get('center-programmes/{id}/symposiums', [CenterProgrammeController::class, 'symposiums'])->name('symposiums.index');
        Route::get('center-programmes/{id}/symposiums/create', [SymposiumController::class, 'create'])->name('symposiums.create');

        Route::resource('settings', SettingController::class)->only('edit', 'update');
        Route::resource('managers', MangerController::class)->except('show', 'index');
        Route::resource('center-programmes', CenterProgrammeController::class);
        Route::resource('abouts', AboutController::class);
        Route::resource('center-publications', CenterPublicationController::class);
        Route::resource('center-news', CenterNewsController::class);
        Route::resource('scientific-papers', ScientificPaperController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('contacts', ContactController::class)->only('index', 'show', 'destroy');
        Route::resource('map-centers', MapCenterController::class);
        Route::resource('calenders', CalenderController::class);


        Route::resource('header-footer', HeaderFooterController::class)->only('index', 'store');
        Route::resource('home', HomeContentController::class)->only('index', 'store');


        Route::get('abouts/{id}/members', [AboutController::class, 'members'])->name('members.index');
        Route::get('{about_id}/members', [MemberController::class, 'create'])->name('members.create');
        Route::resource('members', MemberController::class)->except('index', 'create');


        Route::get('abouts/{id}/trees', [AboutController::class, 'trees'])->name('trees.index');
        Route::get('{about_id}/trees', [TreeStructureController::class, 'create'])->name('trees.create');
        Route::resource('trees', TreeStructureController::class)->except('index', 'create','show');


        Route::get('symposiums/{id}/sessions', [SymposiumController::class, 'sessions'])->name('sessions.index');
        Route::get('symposiums/{id}/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
        Route::resource('symposiums', SymposiumController::class)->except('index', 'create');
        Route::resource('sessions', SessionController::class)->except('index', 'create');


        Route::get('programs/{id}/lectures', [ProgramController::class, 'lectures'])->name('lectures.index');
        Route::get('programs/{id}/lectures/create', [LectureController::class, 'create'])->name('lectures.create');
        Route::resource('programs', ProgramController::class)->except('index', 'create');
        Route::resource('lectures', LectureController::class)->except('index', 'create');
    });
});
