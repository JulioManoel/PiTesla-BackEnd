<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\ActivitieController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\Answer_OptionController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::controller(LogController::class)->group(function () {
  Route::get('/log', 'index');
  Route::post('/log', 'store');
  Route::get('/log/{id}', 'show');
  Route::put('/log/{id}', 'update');
  Route::delete('/log/{id}', 'destroy');
});

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

Route::controller(DisciplineController::class)->group(function () {
  Route::get('/disciplines', 'index');
  Route::post('/disciplines', 'store');
  Route::get('/disciplines/{id}', 'show');
  Route::put('/disciplines/{id}', 'update');
  Route::delete('/disciplines/{id}', 'destroy');
});

Route::controller(ActivitieController::class)->group(function () {
  Route::get('/Activitie', 'index');
  Route::post('/Activitie', 'store');
  Route::get('/Activitie/{id}', 'show');
  Route::put('/Activitie/{id}', 'update');
  Route::delete('/Activitie/{id}', 'destroy');
});

Route::controller(CourseController::class)->group(function () {
  Route::get('/Course', 'index');
  Route::post('/Course', 'store');
  Route::get('/Course/{id}', 'show');
  Route::put('/Course/{id}', 'update');
  Route::delete('/Course/{id}', 'destroy');
});

Route::controller(ActivitieController::class)->group(function () {
  Route::get('/Activitie', 'index');
  Route::post('/Activitie', 'store');
  Route::get('/Activitie/{id}', 'show');
  Route::put('/Activitie/{id}', 'update');
  Route::delete('/Activitie/{id}', 'destroy');
});

Route::controller(TestController::class)->group(function () {
  Route::get('/test', 'index');
  Route::post('/test', 'store');
  Route::get('/test/{id}', 'show');
  Route::put('/test/{id}', 'update');
  Route::delete('/test/{id}', 'destroy');
});

Route::controller(ExerciseController::class)->group(function () {
  Route::get('/exercise', 'index');
  Route::post('/exercise', 'store');
  Route::get('/exercise/{id}', 'show');
  Route::put('/exercise/{id}', 'update');
  Route::delete('/exercise/{id}', 'destroy');
});

Route::controller(Answer_OptionController::class)->group(function () {
  Route::get('/Answer_Option', 'index');
  Route::post('/Answer_Option', 'store');
  Route::get('/Answer_Option/{id}', 'show');
  Route::put('/Answer_Option/{id}', 'update');
  Route::delete('/Answer_Option/{id}', 'destroy');
});