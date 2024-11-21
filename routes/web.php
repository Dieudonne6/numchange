<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NumController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [NumController::class, 'index']);
// Route::post('/convertnum', [NumController::class, 'convertnum']);
Route::post('/convert-contacts', [NumController::class, 'convertContacts'])->name('convert.contacts');
