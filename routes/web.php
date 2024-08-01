<?php

use App\Http\Controllers\Site\ToDoListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Site.home');
})->name('site.home');

Route::controller(ToDoListController::class)->prefix("list")->group( function(){
    Route::get("/index", "index")->name("list.index");
    Route::get("/create", "create")->name("list.create");
    Route::post("/store", "store")->name("list.store");
});


Route::fallback( function(){
    return view('Site.home');
});
