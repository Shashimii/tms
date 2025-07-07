<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Index
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->role === User::ROLE_ADMIN) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === User::ROLE_COORDINATOR) {
            return redirect()->route('coordinator.dashboard');
        }

        if ($user->role === User::ROLE_OFFICER) {
            return redirect()->route('officer.dashboard');
        }
    }

    return Inertia::render('Auth/Login');
});

// Administrator
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'DashboardIndex'])->name('admin.dashboard');
});

// Coordinator
Route::middleware(['auth', 'coordinator'])->group(function () {

});

// Officer
Route::middleware(['auth', 'officer'])->group(function () {

});


// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
