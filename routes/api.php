<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

// Route::controller(LogController::class)->group(function () {

// })