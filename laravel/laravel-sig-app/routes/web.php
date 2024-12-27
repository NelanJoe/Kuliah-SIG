<?php

use App\Http\Controllers\PetaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/beranda", function () {
    return view("beranda");
});


Route::get("/gempa", function () {
    return view("gempa");
});

Route::resource('peta', PetaController::class);
