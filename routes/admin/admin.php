<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\QuestionAndAnswerController;
use App\Http\Controllers\SubtitleController;
use App\Http\Controllers\MediaTrackerController;
use App\Http\Controllers\FeaturedCourseController;


Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'adminLogin']);

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {

    Route::delete('/featured-courses/{course_id}', [FeaturedCourseController::class, 'destroy'])
            ->name('course.unfeature');
    Route::post('/featured-courses', [FeaturedCourseController::class, 'store'])
            ->name('course.feature');
    Route::put('/courses/{course_id}/unpublish', [CourseController::class, 'unpublish'])
            ->name('course.unpublish');
    Route::put('/courses/{course_id}/publish', [CourseController::class, 'publish'])
            ->name('course.publish');
    Route::post('/media-trackers', [MediaTrackerController::class, 'store'])->name('media-trackers.store');
    Route::post('/subtitles', [SubtitleController::class, 'store'])->name('subtitles.store');
    Route::resource('questions', QuestionAndAnswerController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('users', UserController::class);
    Route::resource('lessons', LessonController::class);
    Route::resource('topics', TopicController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('courses', CourseController::class);
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/uploads', [UploadController::class, 'index'])->name('uploads');
    Route::get('logout', [AdminController::class, 'logout'])
    ->name('logout');

});