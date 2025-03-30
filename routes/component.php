<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(PostController::class)->prefix('post')->as('component.post.')->group(function () {
    Route::get("index", "index")->name("index");
});
