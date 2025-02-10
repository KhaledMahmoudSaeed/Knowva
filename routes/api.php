<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ListenController;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\SpeakController;
use App\Http\Controllers\WriteController;
use App\Http\Middleware\HandleCors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(HandleCors::class)->group(function () {

    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/register', [RegisterController::class, 'register'])->name("register");
    // lang api
    Route::get("/lang", [LangController::class, 'index'])->name("lang.index");
    Route::post("/lang", [LangController::class, 'store'])->name("lang.store");
    Route::delete("/lang/{id}", [LangController::class, 'destroy'])->name("lang.destroy");
    // reading api
    Route::get("/read", [ReadController::class, 'index'])->name("read.index");
    Route::post("/read", [ReadController::class, 'store'])->name("read.store");
    Route::delete("/read/{id}", [ReadController::class, 'destroy'])->name("read.destroy");
    //writing api
    Route::get("/write", [WriteController::class, 'index'])->name("write.index");
    Route::post("/write", [WriteController::class, 'store'])->name("write.store");
    Route::delete("/write/{id}", [WriteController::class, 'destroy'])->name("write.destroy");
    //speaking api
    Route::get("/speak", [SpeakController::class, 'index'])->name("speak.index");
    Route::post("/speak", [SpeakController::class, 'store'])->name("speak.store");
    Route::delete("/speak/{id}", [SpeakController::class, 'destroy'])->name("speak.destroy");
    //listening api
    Route::get("/listen", [ListenController::class, 'index'])->name("listen.index");
    Route::post("/listen", [ListenController::class, 'store'])->name("listen.store");
    Route::delete("/listen/{id}", [ListenController::class, 'destroy'])->name("listen.destroy");


});
