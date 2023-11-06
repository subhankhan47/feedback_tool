<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//<----------Products list, url: '/', Home Route: checks if user is authenticated then allowed to access dashboard
Route::get('/',[ProductController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // This route will show all feedback of specific Product
    Route::get('feedback/{pid}', [
        FeedbackController::class, 'showProductFeedback'
    ])->name('showProductFeedback');

    // This route will store the user's feedback on the product
    Route::post('storeFeedback', [
        FeedbackController::class, 'store'
    ])->name('storeFeedback');

    // This route will store the user's comment on the feeback
    Route::post('storeComment', [
        CommentController::class, 'store'
    ])->name('storeComment');
});

require __DIR__.'/auth.php';
