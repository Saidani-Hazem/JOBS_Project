<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EmployeesController;


Route::get('/findemps', [EmployeesController::class, 'index']);

Route::get('/findemp/{id}', [EmployeesController::class, 'show']);

Route::get('/del/{id}', [EmployeesController::class, 'destroy']);




Route::put('/edit/{id}', [EmployeesController::class, 'edit'])->name("submitform");

Route::get('/edit/{id}', [EmployeesController::class, 'empToUpDate'])->name('showform');



Route::post('/', [UsersController::class, 'store'])->name('add');




