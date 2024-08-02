<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admins'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



    /*********************************
     * ****** Category Routes *******
     *********** START **************/
    Route::controller(CategoryController::class)->prefix("category")->group(function () {
        Route::get("index" , "index")->name("category.index");
        Route::get("create" , "create")->name("category.create");
        Route::post("store" , "store")->name("category.store");
        Route::get("show/{category:slug}" , "show")->name("category.show");
        Route::post("update/{category}" , "update")->name("category.update");
    });
    /*********************************
     * ****** Category Routes *******
     *********** END **************/

    /*********************************
     * ****** Content Routes *******
     *********** START **************/
    Route::controller(ContentTypeController::class)->prefix("content-type")->group(function () {
        Route::get("index" , "index")->name("contentType.index");
        Route::get("create" , "create")->name("contentType.create");
        Route::post("store" , "store")->name("contentType.store");
        Route::get("show/{contentType}" , "show")->name("contentType.show");
        Route::post("update/{contentType}" , "update")->name("contentType.update");
    });
    /*********************************
     * ****** Content Routes *******
     *********** END **************/

    /*********************************
     * ****** POSTs Routes **********
     *********** START **************/
    Route::controller(PostController::class)->prefix("post")->group(function (){
        Route::get("index" , "index")->name("post.index");
        Route::get("create" , "create")->name("post.create");
        Route::post("store" , "store")->name("post.store");
        Route::get("show/{post:slug}" , "show")->name("post.show");
        Route::post("update/{post}" , "update")->name("post.update");
    });
    /*********************************
     * ****** POSTs Routes **********
     *********** END **************/

    /*********************************
     * ****** Image Routes **********
     *********** START **************/
    Route::controller(ImageController::class)->prefix("image")->group(function (){
        Route::get("index" , "index")->name("image.index");
        Route::get("create" , "create")->name("image.create");
        Route::post("store" , "store")->name("image.store");
        Route::get("show/{image:slug}" , "show")->name("image.show");
        Route::post("update/{image}" , "update")->name("image.update");
        Route::delete("delete/{image}" , "delete")->name("image.delete");
    });
    /*********************************
     * ****** Image Routes **********
     *********** END **************/

    /*********************************
     * ****** Banner Routes *******
     *********** START **************/
    Route::controller(BannerController::class)->prefix("banner")->group(function () {
        Route::get("index" , "index")->name("banner.index");
        Route::get("create" , "create")->name("banner.create");
        Route::post("store" , "store")->name("banner.store");
        Route::get("show/{banner}" , "show")->name("banner.show");
        Route::post("update/{banner}" , "update")->name("banner.update");
        Route::delete("delete/{banner}" , "delete")->name("banner.delete");
    });
    /*********************************
     * ****** Banner Routes *******
     *********** END **************/

    /*********************************
     * ****** Section Routes *******
     *********** START **************/
    Route::controller(SectionController::class)->prefix("section")->group(function () {
        Route::get("index" , "index")->name("section.index");
        Route::get("create" , "create")->name("section.create");
        Route::post("store" , "store")->name("section.store");
        Route::get("show/{section:slug}" , "show")->name("section.show");
        Route::post("update/{section}" , "update")->name("section.update");
        Route::delete("delete/{section}" , "delete")->name("section.delete");
    });
    /*********************************
     * ****** Section Routes *******
     *********** END **************/

    /*********************************
     * ****** Permission Routes *******
     *********** START **************/
    Route::controller(PermissionController::class)->prefix("permission")->group(function () {
        Route::get("index/{admin}" , "index")->name("permission.index");
        Route::get("users" , "showUsers")->name("permission.users");
        Route::post("assign/{admin}" , "store")->name("permission.store");
    });
    /*********************************
     * ****** Permission Routes *******
     *********** END **************/

});
