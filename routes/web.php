<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// check session status (used by client-side JS)
Route::get('/session-status', function (Request $request) {
    return response()->json(['authenticated' => Auth::check()]);
})->name('session.status');

Route::get('/', function () {
    return redirect()->route('login');
});

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ✅ Only authenticated users can see resume
Route::middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/resume', [ResumeController::class, 'show'])->name('resume');
});