<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\Materi\SoalController;
use App\Http\Controllers\Materi\MateriController;
use App\Http\Controllers\Auth\{LoginController, LogoutController, MeController, RegisterController, DetailController, CekDetailController};

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);

Route::middleware('auth:api')->group( function () {
    Route::post('logout', LogoutController::class);
    Route::post('detail', DetailController::class);
    Route::get('detail', CekDetailController::class);
    Route::get('me', MeController::class);
    Route::post('accGuru', [UserController::class,'accGuru']);
    Route::post('user/del', [UserController::class,'delUser']);
    Route::post('nilai', [NilaiController::class,'getNilaiUser']);

    Route::post('materi/add', [MateriController::class,'addMateri']);
    Route::post('materi', [MateriController::class,'getMateri']);
    Route::post('soal/add', [SoalController::class,'saveSoal']);
    Route::post('soal/all', [SoalController::class,'getSoals']);
    Route::post('soal', [SoalController::class,'getSoal']);
    Route::post('materi/del', [MateriController::class,'deleteMateri']);
    Route::post('materi/all', [MateriController::class,'getAllMateri']);
    Route::post('users', [UserController::class,'getUsers']);
    Route::post('jawaban/add', [JawabanController::class,'saveJawaban']);
    Route::post('nilai/add', [NilaiController::class,'getNilai']);

});
