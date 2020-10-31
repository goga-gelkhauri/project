<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\GoogleSocialiteController;
use App\Http\Controllers\Auth\FacebookSocialiteController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\UserController;

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


Route::get('/bookmarks',[BookmarkController::class, 'bookmarks']);
Route::get('/addBookmark/{id}',[BookmarkController::class, 'addBookmark']);
Route::get('/deleteBookmark/{id}',[BookmarkController::class, 'deleteBookmark']);

Route::get('/addCompanyBookmark/{id}',[BookmarkController::class, 'addCompanyBookmark']);
Route::get('/deleteCompanyBookmark/{id}',[BookmarkController::class, 'deleteCompanyBookmark']);

Route::get('/companies',[CompanyController::class, 'index']);
Route::get('/company/{id}',[CompanyController::class, 'showCompany']);

Route::get('/follow/{id}',[FollowController::class, 'follow']);
Route::get('/unfollow/{id}',[FollowController::class, 'unfollow']);

Route::get('/',[HomeController::class, 'home']);
Route::get('/jobs/search',[HomeController::class, 'search']);
Route::get('/show/job/{id}',[HomeController::class, 'show']);


Route::get('/timeline',[UserController::class, 'timeline']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//google auth
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

//facebook auth
//google auth
Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);


//skills
Route::resource('skills', SkillController::class);

//categories
Route::resource('categories', CategoryController::class);

//Jobs
Route::resource('jobs', JobController::class);