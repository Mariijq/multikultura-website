<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\ProjectsController;
use App\Http\Controllers\Backend\PublicationsController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LanguageController;   

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('frontend.home');})->name('home');

Route::get('/', [HomeController::class, 'news'])->name('home');

Route::get('lang/{locale}', [LanguageController::class, 'switch'])
    ->whereIn('locale', ['en', 'mk', 'al'])
    ->name('switch.lang');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::view('/dashboard', 'admin.dashboard')
            ->name('dashboard');

        Route::get('/settings', [SettingsController::class, 'index'])
            ->name('settings');

        Route::post('/settings/account', [SettingsController::class, 'updateAccount'])
            ->name('settings.account.update');

        Route::post('/settings/password', [SettingsController::class, 'updatePassword'])
            ->name('settings.password.update');

        Route::post('/settings/reset-password', [SettingsController::class, 'sendResetLink'])
            ->name('settings.reset-password');

        Route::post('/settings/appearance', [SettingsController::class, 'updateAppearance'])
            ->name('settings.appearance.update');

        Route::post('/settings/language', [SettingsController::class, 'updateLanguage'])
            ->name('settings.language.update');

        Route::get('/about', [AboutController::class, 'index'])
            ->name('about');

        Route::post('/about', [AboutController::class, 'update'])
            ->name('about.update');

        Route::resource('news', NewsController::class);
        Route::resource('projects', ProjectsController::class);
        Route::resource('publications', PublicationsController::class);

        Route::get('/contact', [ContactController::class, 'index'])
            ->name('contact');

        Route::post('/contact', [ContactController::class, 'update'])
            ->name('contact.update');
    });

require __DIR__.'/auth.php';