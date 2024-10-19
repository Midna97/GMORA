<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoginController;

Route::post('/login',[LoginController::class,'login']);
Route::middleware('auth:sanctum')->group(
    function(){
        Route::get('/user', [UserController::class,'index'])->middleware('roles:Administrador');
        Route::get('/user/{id}', [UserController::class,'show'])->name('user.show');
        Route::post('/user',[UserController::class,'store']);
        Route::get('/recipe/{id}',[RecipeController::class,'show']);
        Route::get('/recipe',[RecipeController::class,'index']);
        Route::post('/recipe',[RecipeController::class,'store']);
        Route::get('/category',[CategoryController::class,'index']);
        Route::post('/category',[CategoryController::class,'store']);
        Route::get('/role/{id}',[RoleController::class,'show']);
        Route::get('/role',[RoleController::class,'index']);
        Route::post('/role',[RoleController::class,'store']);
    }
);