<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function (Request $request) {
    $users = DB::table('password_entries')->where('user_id', '=', $request->user()->id)->get();

    return view('dashboard', ['entries'=>$users]);
})->middleware(['auth'])->name('dashboard');

Route::post('/savepassword', [\App\Http\Controllers\PasswordEntryController::class, 'store'])
    ->middleware('auth')
    ->name('savepassword');

require __DIR__.'/auth.php';

require __DIR__.'/mail.php';
