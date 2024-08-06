<?php

use App\Http\Controllers\Site\ToDoListController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Site.home');
})->name('site.home');

Route::middleware(["autenticador"])->controller(ToDoListController::class)->prefix("list")->group( function(){
    Route::get("/index", "index")->name("list.index");
    Route::get("/create", "create")->name("list.create");
    Route::get("/edit", "edit")->name("list.edit");
    Route::post("/store", "store")->name("list.store");
    Route::put("/update", "update")->name("list.update");
});

Route::controller(UserController::class)->prefix("user")->group( function(){
    Route::get("/login", "login")->name("user.login");
    Route::get("/create", "create")->name("user.create");
    Route::post("/logar", "logar")->name("user.logar");
    Route::post("/register", "register")->name("user.register");
    Route::delete("/destroy", "destroy")->name("user.destroy");
});

Route::fallback( function(){
    return view('Site.home');
});
