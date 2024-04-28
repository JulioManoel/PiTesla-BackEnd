<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
  Route::get('/me', 'me');
  Route::post('/login', 'login');
});

Route::controller(SchoolController::class)->group(function () {
  Route::get('/school', 'index');
  Route::post('/school', 'store');
  Route::get('/school/{id}', 'show');
  Route::put('/school/{id}', 'update');
  Route::delete('/school/{id}', 'destroy');
});

Route::controller(StudentController::class)->group(function () {
  Route::get('/student', 'index');
  Route::post('/student', 'store');
  Route::get('/student/{id}', 'show');
  Route::put('/student/{id}', 'update');
  Route::delete('/student/{id}', 'destroy');
});

Route::controller(TeacherController::class)->group(function () {
  Route::get('/teacher', 'index');
  Route::post('/teacher', 'store');
  Route::get('/teacher/{id}', 'show');
  Route::put('/teacher/{id}', 'update');
  Route::delete('/teacher/{id}', 'destroy');
});

Route::controller(LogController::class)->group(function () {
  Route::get('/log', 'index');
  Route::post('/log', 'store');
  Route::get('/log/{id}', 'show');
  Route::put('/log/{id}', 'update');
  Route::delete('/log/{id}', 'destroy');
});