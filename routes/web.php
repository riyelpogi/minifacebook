<?php

use App\Http\Controllers\myController;
use App\Http\Controllers\myController2;
use App\Http\Controllers\PhotoController;
use App\Http\Livewire\HOme;
use App\Http\Livewire\LiveComment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user.login');
});

Route::middleware('auth')->group(function() {
    Route::get('/home', [myController::class, 'index'])->name('home');
    Route::post('/logout', [myController::class, 'logoutProcess'])->name('logoutProcess');
    Route::get('/profile/{id}', [myController::class, 'show'])->name('show');
    Route::get('/myprofile', [myController::class, 'showuserprofile'])->name('showuserprofile');
    Route::put('/profile/add/bio/{id}', [myController::class, 'update'])->name('update');
    Route::put('/edit/profile/picture', [myController::class, 'storeDP'])->name('storeDP');
    Route::put('/update/profile/picture', [myController::class, 'updateDP'])->name('updateDP');
    Route::get('/edit/myinfo', [myController::class, 'updateInfo'])->name('updateInfo');
    Route::post('/insert/myinfo', [myController::class, 'storeUserInfo'])->name('storeUserInfo');
    Route::get('/update/myinfo', [myController::class, 'updateUserInfo'])->name('updateUserInfo');
    Route::put('/update/myinfo/submit', [myController::class, 'updateUserInfoSubmit'])->name('updateUserInfoSubmit');
    Route::get('/search', [myController::class, 'showSearch'])->name('showSearch');
    Route::get('/mynotifications', [myController::class, 'showNotifications'])->name('showNotifications');
    Route::get('/post/{postid}/{id}', [myController::class, 'showPost'])->name('showPost');
    Route::get('/create/photos', [PhotoController::class, 'create'])->name('create');
    Route::post('/store/photo', [PhotoController::class, 'store'])->name('storePhoto');

    
  
    Route::get('/anonymous/message/{id}', [myController2::class, 'createAnonymousMessage'])->name('createAnonymousMessage');
    Route::post('/store/anonymous/message', [myController2::class, 'storeAnonymousMessage'])->name('storeAnonymousMessage');
    Route::get('/view/anonymous/message', [myController2::class, 'showAnonymousMessage'])->name('showAnonymousMessage');
    
    Route::get('/userinfo/set/public', [myController2::class, 'setAsPublic'])->name('setAsPublic');
    Route::get('/userinfo/set/private', [myController2::class, 'setAsPrivate'])->name('setAsPrivate');
    Route::get('/notification/delete/{id}', [myController2::class, 'deleteNotification'])->name('deleteNotification');
    Route::get('/markasread/all/notifications', [myController2::class, 'markAsReadAllNotifications'])->name('markAsReadAllNotifications');
    Route::delete('/delete/post/{id}', [myController2::class, 'destroy'])->name('destroy');
});
Route::get('/login', [myController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/process', [myController::class, 'loginProcess']);
Route::get('/register', [myController2::class, 'create'])->middleware('guest');
Route::post('/register/process', [myController2::class, 'store']);

