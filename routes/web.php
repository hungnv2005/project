<?php

use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\LesionController as AdminLesionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LesionController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');
Route::get('/lesion/{id}', [LesionController::class, 'show'])->name('lesion.show');
Route::post('/course/{id}/register', [CourseController::class, 'register'])->name('course.register');

Route::prefix('admin')->group(function () {
    Route::resource('courses', AdminCourseController::class);
});
Route::prefix('admin')->group(function () {
    Route::resource('lesions', AdminLesionController::class);
});
