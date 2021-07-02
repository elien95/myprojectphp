<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

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
    if (Auth::check()) {
        return redirect('/projects');
    }
    return view('welcome');
});

Auth::routes();

//Route::resource('/projects',ProjectController::class);

Route::patch('/projects/{project}/tasks/{task}',[TaskController::class, 'update']);

Route::delete('/projects/{project}/tasks/{task}',[TaskController::class, 'destroy']);

Route::resource('projects',ProjectController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/projects/{project}/tasks',[TaskController::class, 'store']);

Route::get('/profile' , [ProfileController::class , 'index']);

Route::patch('/profile' , [ProfileController::class , 'update']);