<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

#Menu Routes

Route::middleware(['auth', 'admin'])->get('/newMenu', [App\Http\Controllers\MenuController::class, 'menuFormInsert'])->name('menuInsert')->middleware('auth'); #Form menu
Route::middleware(['auth', 'admin'])->post('/newMenu', [App\Http\Controllers\MenuController::class, 'menuCreate']); #Insert menu

Route::middleware(['auth', 'admin'])->get('/menu', [App\Http\Controllers\MenuController::class, 'menuList'])->name('listMenu'); #List items from menu

Route::middleware(['auth', 'admin'])->get('/menuDelete/{id}', [App\Http\Controllers\MenuController::class, 'menuDelete'])->name('deleteMenu'); #Delete items from menu

Route::middleware(['auth', 'admin'])->get('/updateMenu/{id}', [App\Http\Controllers\MenuController::class, 'menuFormUpdate'])->name('menuUpdate'); #Form update menu
Route::middleware(['auth', 'admin'])->post('/updateMenu/{id}', [App\Http\Controllers\MenuController::class, 'menuUpdate']); #Update Menu

#Requests Routes


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); #Requests page, only available to guests
Route::post('/home', [App\Http\Controllers\RequestController::class, 'requestCreate']); #Insert request

Route::middleware(['auth', 'admin'])->get('/dashboard', [App\Http\Controllers\RequestController::class, 'requestList'])->name('requests'); #Show requests to the kitchen

Route::middleware(['auth', 'admin'])->get('/deleteRequest/{id}', [App\Http\Controllers\RequestController::class, 'requestDelete'])->name('delR'); #Delete request once done

Route::middleware(['auth', 'admin'])->get('/editRequest/{id}', [App\Http\Controllers\RequestController::class, 'requestEdit'])->name('editR');
Route::middleware(['auth', 'admin'])->post('/editRequest/{id}', [App\Http\Controllers\RequestController::class, 'requestEditA']);







