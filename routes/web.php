<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::get("/" ,[CrudController::class, "index"])->name("crud.index");
Route::post("/" ,[CrudController::class, "create"])->name("crud.create");
Route::post("/update" ,[CrudController::class, "update"])->name("crud.update");
Route::get("/{id}" ,[CrudController::class, "delete"])->name("crud.delete");

