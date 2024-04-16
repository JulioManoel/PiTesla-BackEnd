<?php
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;

Route::controller(SchoolController::class)->group(function () {
  Route::get('/school', 'index');
  Route::post('/school', 'store');
});