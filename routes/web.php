<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Site.home');
})->name('Site.home');

Route::fallback( function(){
    return view('Site.home');
});
