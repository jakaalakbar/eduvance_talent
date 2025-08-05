<?php

use App\Http\Controllers\administrator\usersController;
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

Route::get('/', function () {
    return view('landing.landing');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('administrator.index');
    })->name('home');

    Route::middleware(['role:0'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::controller(usersController::class)->group(function () {
                Route::get('/users', 'index')->name("admin.users");
                Route::get('/users/{id}', 'show')->name("admin.users.show");
                Route::put('/users/update/{id}', 'update')->name("admin.users.update");
                Route::delete('/users/delete/{id}', 'destroy')->name("admin.users.destroy");
            });
        });
    });

    Route::middleware(['role:1'])->group(function () {
        Route::prefix('student')->group(function () {
            Route::get('/dashboard', function () {
                return 'Halaman Pengaturan Student';
            });
        });
    });
});
