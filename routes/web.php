<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Route untuk halaman web (dashboard)
| API sensor ada di routes/api.php
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    // halaman dashboard utama
    return view('dashboardopsi');
});
