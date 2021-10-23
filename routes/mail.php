<?php

use Illuminate\Support\Facades\Route;

Route::get('/sendbasicemail', [\App\Http\Controllers\MailController::class, 'basic_email'])
    ->middleware('guest')
    ->name('sendbasicemail');

