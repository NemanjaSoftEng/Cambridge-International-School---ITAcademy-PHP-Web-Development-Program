<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect ('/ProjectManagement');
});

Route::resource("/ProjectManagement", "App\Http\Controllers\ProjectManagementController");
