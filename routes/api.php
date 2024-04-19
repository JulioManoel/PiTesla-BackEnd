<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachertController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ActivitieController;
use App\Http\Controllers\Answer_OptionController;
use App\Http\Controllers\CoursetController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\ExerciseController;
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

Route::controller(TeachertController::class)->group(function () {
  Route::get('/teacher', 'index');
  Route::post('/teacher', 'store');
  Route::get('/teacher/{id}', 'show');
  Route::put('/teacher/{id}', 'update');
  Route::delete('/teacher/{id}', 'destroy');
});

Route::controller(TestController::class)->group(function () {
  Route::get('/test', 'index');
  Route::post('/test', 'store');
  Route::get('/test/{id}', 'show');
  Route::put('/test/{id}', 'update');
  Route::delete('/test/{id}', 'destroy');
});

Route::controller(ActivitieController::class)->group(function () {
  Route::get('/activitie', 'index');
  Route::post('/activitie', 'store');
  Route::get('/activitie/{id}', 'show');
  Route::put('/activitie/{id}', 'update');
  Route::delete('/activitie/{id}', 'destroy');
});

Route::controller(Answer_OptionController::class)->group(function () {
  Route::get('/answer_option', 'index');
  Route::post('/answer_option', 'store');
  Route::get('/answer_option/{id}', 'show');
  Route::put('/answer_option/{id}', 'update');
  Route::delete('/answer_option/{id}', 'destroy');
});

Route::controller(CoursetController::class)->group(function () {
  Route::get('/course', 'index');
  Route::post('/course', 'store');
  Route::get('/course/{id}', 'show');
  Route::put('/course/{id}', 'update');
  Route::delete('/course/{id}', 'destroy');
});

Route::controller(DisciplineController::class)->group(function () {
  Route::get('/discipline', 'index');
  Route::post('/discipline', 'store');
  Route::get('/discipline/{id}', 'show');
  Route::put('/discipline/{id}', 'update');
  Route::delete('/discipline/{id}', 'destroy');
});

Route::controller(ExerciseController::class)->group(function () {
  Route::get('/exercise', 'index');
  Route::post('/exercise', 'store');
  Route::get('/exercise/{id}', 'show');
  Route::put('/exercise/{id}', 'update');
  Route::delete('/exercise/{id}', 'destroy');
});

Route::controller(logController::class)->group(function () {
  Route::get('/log', 'index');
  Route::post('/log', 'store');
  Route::get('/log/{id}', 'show');
  Route::put('/log/{id}', 'update');
  Route::delete('/log/{id}', 'destroy');
});
// Route::controller(LogController::class)->group(function () {

// })