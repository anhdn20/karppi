<?php

use App\Http\Controllers\admin\bannerController;
use App\Http\Controllers\admin\blogController as AdminBlogController;
use App\Http\Controllers\admin\categoriesController;
use App\Http\Controllers\admin\ConfigController;
use App\Http\Controllers\admin\FoodController;
use App\Http\Controllers\admin\FoodGroupController;
use App\Http\Controllers\admin\FoodMenuController;
use App\Http\Controllers\admin\galleryController;
use App\Http\Controllers\admin\reviewController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\dropZoneController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


route::get('/', [homeController::class, 'home']);
route::get('/about-us', [homeController::class, 'about']);
route::get('/gallery', [homeController::class, 'gallery']);
route::get('/menu', [homeController::class, 'menu']);



// up ảnh
Route::post('/dropzone', [dropZoneController::class, 'Updropzone']);
Route::post('/dropzonedel', [dropZoneController::class, 'dropzoneDel']);



// trang quản lí
Route::post('/loginAdmin', [AdminController::class, 'login']);
route::group(['middleware' => 'checkLogin'],function(){
    route::prefix('/karppi/admin')->group(function(){
        route::get('/', [AdminController::class, 'home']);

        // =============================== Quản lí food ================================
        route::prefix('/food')->group(function () {
            route::get('/', [AdminController::class, 'food']);
            Route::post('/list', [FoodController::class, 'list']);
            route::post('/create', [FoodController::class, 'create']);
            Route::post('/delete', [FoodController::class, 'delete']);
            Route::post('/detail', [FoodController::class, 'detail']);
        });
        // =============================== Quản lí food ================================

        // ============================ Quản lí food Group =============================
        route::prefix('/food-group')->group(function () {
            route::get('/', [AdminController::class, 'foodGroup']);
            Route::post('/list', [FoodGroupController::class, 'list']);
            route::post('/create', [FoodGroupController::class, 'create']);
            Route::post('/delete', [FoodGroupController::class, 'delete']);
            Route::post('/detail', [FoodGroupController::class, 'detail']);
        });
        // ============================ Quản lí food Group =============================

        // ============================ Quản lí food menu ==============================
        route::prefix('/food-menu')->group(function () {
            route::get('/', [AdminController::class, 'foodMenu']);
            Route::post('/list', [FoodMenuController::class, 'list']);
            route::post('/create', [FoodMenuController::class, 'create']);
            Route::post('/delete', [FoodMenuController::class, 'delete']);
            Route::post('/active', [FoodMenuController::class, 'active']);
            Route::post('/detail', [FoodMenuController::class, 'detail']);
        });
        // ============================ Quản lí food Group =============================


        // =============================== quản lí banner ================================
        route::prefix('/quan-li-hinh-anh')->group(function(){
            route::get('/', [AdminController::class, 'banner']);
            route::post('/them', [bannerController::class, 'store']);
            Route::post('/xoa', [bannerController::class, 'delete']);
        });
        Route::post('/data-banner', [bannerController::class, 'list']);
        Route::post('/banner-detail', [bannerController::class, 'detail']);
        // =============================== quản lí banner ================================


        // =============================== quản lí gallery ================================
        route::prefix('/gallery')->group(function(){
            route::get('/', [AdminController::class, 'gallery']);
            route::post('/them', [galleryController::class, 'store']);
            Route::post('/xoa', [galleryController::class, 'delete']);
        });
        Route::post('/data-gallery', [galleryController::class, 'list']);
        Route::post('/gallery-detail', [galleryController::class, 'detail']);
        // =============================== quản lí gallery ================================

           // =============================== quản lí cấu hình chung ================================
        route::prefix('/quan-li-config')->group(function(){
            route::get('/', [adminController::class, 'config']);
            route::post('/them', [ConfigController::class, 'store']);
        });
        Route::post('/data-config', [ConfigController::class, 'list']);
        Route::post('/config-detail', [ConfigController::class, 'detail']);
            // =============================== quản lí cấu hình chung ================================


    });
});



