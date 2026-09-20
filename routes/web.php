<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\ProjectsController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::view('/dashboard', 'admin.dashboard')
            ->name('dashboard');

        Route::get('/about', [AboutController::class, 'index'])
            ->name('about');

        Route::post('/about', [AboutController::class, 'update'])
            ->name('about.update');

        Route::resource('news', NewsController::class);
        Route::resource('projects', ProjectsController::class);

    });

require __DIR__.'/auth.php';