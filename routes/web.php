<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WeddingPackageController;
use App\Http\Controllers\WeddingTestimonialController;
use App\Http\Controllers\WeddingPackageBonusController;

Route::get('packages', [WeddingPackageController::class, 'forUser'])->name('packages.forUser');
Route::get('packages/{id}', [WeddingPackageController::class, 'show'])->name('packages.show');
Route::get('packages/{id}/book', [WeddingPackageController::class, 'book'])->name('packages.book');
Route::post('packages/{id}/book', [WeddingPackageController::class, 'bookStore'])->name('packages.bookStore');

Route::group(['middleware' => ['role:admin']], function() {
    Route::resource('wedding-packages', WeddingPackageController::class);
    Route::resource('category', CategoryController::class);
});


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::middleware(['auth'])->group(function () {
    Route::resource('wedding-testimonials', WeddingTestimonialController::class );
    Route::resource('transactions', TransactionController::class);
    Route::resource('wedding-bonuses', WeddingPackageBonusController::class);
});



require __DIR__.'/auth.php';
