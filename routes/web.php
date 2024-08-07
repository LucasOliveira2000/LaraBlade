<?php

use App\Http\Controllers\Site\ToDoListController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->back();
    }else{
        return view('Site.home');
    }
})->name('site.home');

Route::middleware(["autenticador"])->controller(ToDoListController::class)->prefix("list")->group(function(){
    Route::get("/index", "index")->name("list.index");
    Route::get("/create", "create")->name("list.create");
    Route::get("/edit/{uuid}", "edit")->name("list.edit");
    Route::get("/atividadesConcluidas", "atividadesConcluidas")->name("list.atividadesConcluidas");
    Route::post("/store", "store")->name("list.store");
    Route::patch("/concluir/{uuid}", "concluir")->name("list.concluir");
    Route::post("/update/{uuid}", "update")->name("list.update");
    Route::delete("/destroy/{uuid}", "destroy")->name("list.destroy");
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
