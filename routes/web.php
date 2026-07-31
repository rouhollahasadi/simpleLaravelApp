<?php

use Illuminate\Support\Facades\Route;

// Question: How can I define a route with a parameter in Laravel?
//دو پارامتر به متود گت پاس دادیم  / همون دامنه ما هستش
//
//وقتی یک ادرس در مرورگر وارد میکنیم فایل web.php از بالا به پایین بررسی میشه 
//به تابعب که در پارامتر دوم میدیم میگیم کلوژر


Route::get('/', function () {
    //return "asadi" ;
    //return "<h1>Asadi</h1>";
    return view('welcome');
})->name('home');

Route::get('/product/{id}/{name}', function ($id, $name) {
    return "<h1>Product id is :{$id}, name:{$name}</h1>";
});


Route::get('/about', function () {
    //return "<a href='/contact'>Contact page</a>";
    return "<a href='" . route('contact', [15, "Mehdi"]) . "'>Contact page</a>";
});

Route::get('/contact/test/{id}/{name}', function ($id, $name) {
    return "<h2>Contact page , id is:{$id}, name is:{$name}  </h2>";
})->name('contact');


/*
use App\Http\Controllers\UserController;

Route::prefix('users')
    ->name('users.')
    ->group(function () {
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::post('/',[UserController::class,'store'])->name('store');
        Route::get('/{id}',[UserController::class,'show'])->name('show');
        Route::get('/{id}/edit',[UserController::class,'edit'])->name('edit');
        Route::put('/{id}',[UserController::class,'update'])->name('update');
        Route::delete('/{id}',[UserController::class,'destroy'])->name('destroy');
    });
*/




Route::group(['prefix'=>'users'],function(){
 Route::get('/', function () {
            return "Users List";
        });

        Route::get('/create', function () {
            return "Users created";
        });

        Route::get('/{id}', function (int $id) {
            return "User id is:{$id}";
        });
});


use App\Http\Controllers\UserController;

Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::patch('/users/{id}', [UserController::class, 'partialUpdate']);