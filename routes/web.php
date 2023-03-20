<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
  if(auth()->user()) {
    return view('home');
  } else {
    return redirect()->route('login');
  }
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/with/{user}', [ChatController::class, 'chat_with'])->name('chat.with');
Route::get('/{chat}', [ChatController::class, 'show'])->name('chat.show');