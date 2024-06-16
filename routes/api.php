<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\ActivitieController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AnswerOptionController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
  Route::get('/me', 'me');
  Route::post('/login', 'login');
});

Route::apiResources([
  'school' => SchoolController::class,
  'student' => StudentController::class,
  'teacher' => TeacherController::class,
  'discipline' => DisciplineController::class,
  'course' => CourseController::class,
  'activitie' => ActivitieController::class,
  'test' => TestController::class,
  'exercise' => ExerciseController::class,
  'answerOption' => AnswerOptionController::class,
  'log' => LogController::class
]);