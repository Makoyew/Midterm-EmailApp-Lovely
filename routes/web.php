<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\LogController;
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

Route::get('/', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::post('/dashboard', [AuthController::class, 'login'])->name('dashboard');

Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);

Route::resource('boutique', BoutiqueController::class);
Route::get('/logs', [LogController::class, 'index'])->name('logs.index');

Route::post('/boutique/reserve/{boutique}', [BoutiqueController::class, 'reserve'])->name('boutique.reserve');
Route::get('/confirmation', [BoutiqueController::class, 'showConfirmation'])->name('confirmation.index');

Route::put('/accept-reservation/{boutique}', [BoutiqueController::class, 'acceptReservation'])->name('accept.reservation');
Route::put('/reject-reservation/{boutique}', [BoutiqueController::class, 'rejectReservation'])->name('reject.reservation');
// Route::delete('/remove-reservation/{boutique}', [BoutiqueController::class, 'removeReservation'])->name('remove.reservation');



