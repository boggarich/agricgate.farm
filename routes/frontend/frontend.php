<?php

use App\Http\Controllers\ViewsController;
use App\Http\Controllers\QuestionAndAnswerController;
use App\Http\Controllers\FavoriteCourseController;
use App\Http\Controllers\EnrollCourseController;
use App\Http\Middleware\SaveCourseProgress;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Course;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Http\Controllers\CourseProgressController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\SearchController; 
use App\Http\Controllers\NewsletterUserController; 

Route::get('/set-locale/{locale}', function(string $locale) {

        if (! in_array($locale, ['en', 'tw', 'fr', 'ha'])) {
                abort(400);
        }

        App::setLocale($locale);
        
        session()->put('locale', $locale);

        return back();

})->name('set-locale');

Route::middleware('guest')->group(function() {

        Route::get('/e-commerce', function() {

                return redirect()->away('https://shop.agricgate.farm');

        })->name('e-commerce');

        Route::post('/newsletter-users', [NewsletterUserController::class, 'store'])
                ->name('newsletter-users.store');

        Route::get('/contact-us', function() {

                return view('frontend.contact-us');

        })->name('contact-us');


        Route::get('/our-mission-and-vision', function() {

                return view('frontend.our-mission-and-vision');

        })->name('our-mission-and-vision');

        Route::get('/about-us', function() {

                return view('frontend.about-us');

        })->name('about-us');

        Route::get('/blogs', [ViewsController::class, 'blogs'])->name('blogs-page');
        Route::get('/blogs/{blog_id}', [ViewsController::class, 'blog'])->name('blog-page');
        Route::post('/donate/verify', [DonateController::class, 'verify'])
                ->name('donate.verify');
        Route::get('/donate/verify/{transaction_ref}', [DonateController::class, 'create_verify'])->name('donate.create-verify');
        Route::post('/donate/send-otp', [DonateController::class, 'send_otp'])->name('donate.send-otp');
        Route::get('/donate/send-otp/{transaction_ref}', [DonateController::class, 'create_otp'])
                ->name('donate.create-otp');
        Route::post('/donate/transaction/{channel}/charge', [DonateController::class, 'charge'])
                ->name('donate.charge');
        Route::get('/donate', [DonateController::class, 'create_charge'])->name('donate.create-charge');
        Route::get('/', [ViewsController::class, 'index'] )->name('landing-page');
        Route::get('/course/{course_id}', [ViewsController::class, 'course'] )->name('course-page');
        Route::get('/explore/{course_category_id?}', [ViewsController::class, 'explore'])->name('explore');
        Route::get('/search', [SearchController::class, 'index'])->name('search');
        
});

Route::middleware('auth')->group(function () {
        
        Route::post('/reply', [ReplyController::class, 'store'])->name('add-reply');
        Route::get('/start-learning/course/{course_id}/lesson/{lesson_id?}', [CourseProgressController::class, 'start_learning'])->name('start-learning');
        Route::put('/account', [RegisteredUserController::class, 'update']);
        Route::get('/account/{tab?}', [ViewsController::class, 'account'])->name('account');
        Route::post('/comment', [CommentController::class, 'store'])->name('add-comment');
        Route::get('/course/{course_id}/lesson/{lesson_id?}', [ViewsController::class, 'lesson'] )
                ->middleware(SaveCourseProgress::class)
                ->name('lesson-page');
        Route::post('/ask-question', [QuestionAndAnswerController::class, 'store_question'])
        ->name('ask-question');
        Route::post('/favorite', [FavoriteCourseController::class, 'store'])->name('add-favorite');
        Route::post('/enroll', [EnrollCourseController::class, 'store'])->name('enroll');
        

});


Route::get('/test', function() {

        $course = Course::find("1")
                        ->lessons()
                        ->where(function (Builder $query) {

                                return $query->find(1);

                        })
                        ->exists();

        return $course;

});


