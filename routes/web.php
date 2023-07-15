<?php

use App\Http\Controllers\admin\bannerController;
use App\Http\Controllers\admin\FoodController;
use App\Http\Controllers\admin\blogController as AdminBlogController;
use App\Http\Controllers\admin\categoriesController;
use App\Http\Controllers\admin\galleryController;
use App\Http\Controllers\admin\reviewController;
use App\Http\Controllers\admin\tourController as AdminTourController;
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

        // =============================== Quản lí menu food ================================
        route::prefix('/food')->group(function () {
            route::get('/', [AdminController::class, 'food']);
            route::post('/create', [FoodController::class, 'create']);
            Route::post('/delete', [FoodController::class, 'delete']);
            Route::post('/detail', [FoodController::class, 'detail']);
        });
        Route::post('/data-food', [FoodController::class, 'list']);
        Route::post('/tour-detail', [AdminTourController::class, 'detail']);
        // =============================== quản lí tour ================================

        // =============================== quản lí tour ================================
        route::prefix('/quan-li-tour')->group(function(){
            route::get('/', [AdminController::class, 'tour']);
            route::post('/them', [AdminTourController::class, 'store']);
            Route::post('/xoa', [AdminTourController::class, 'delete']);
            Route::post('/xoa-anh', [AdminTourController::class, 'deleteGallery']);
        });
        Route::post('/data-tour', [AdminTourController::class, 'list']);
        Route::post('/tour-detail', [AdminTourController::class, 'detail']);
        // =============================== quản lí tour ================================


        // =============================== quản lí user ================================
        route::prefix('/quan-li-nguoi-dung')->group(function(){
            route::get('/', [AdminController::class, 'user']);
            route::post('/them', [userController::class, 'store']);
            Route::post('/xoa', [userController::class, 'delete']);
        });
        Route::post('/data-user', [userController::class, 'list']);
        Route::post('/user-detail', [userController::class, 'detail']);
        // =============================== quản lí user ================================



        // =============================== quản lí danh mục ================================
        route::prefix('/quan-li-danh-muc-blog')->group(function(){
            route::get('/', [AdminController::class, 'categoryBlog']);
            route::post('/them', [categoriesController::class, 'store']);
            Route::post('/xoa', [categoriesController::class, 'delete']);
        });
        Route::post('/data-categories-blog', [categoriesController::class, 'listBlog']);
        Route::post('/categories-detail-blog', [categoriesController::class, 'detail']);
        // =============================== quản lí danh mục ================================

        // =============================== quản lí danh mục ================================
        route::prefix('/quan-li-danh-muc-tour')->group(function(){
            route::get('/', [AdminController::class, 'categoryTour']);
            route::post('/them', [categoriesController::class, 'store']);
            Route::post('/xoa', [categoriesController::class, 'delete']);
        });
        Route::post('/data-categories', [categoriesController::class, 'listTour']);
        Route::post('/categories-detail', [categoriesController::class, 'detail']);
        // =============================== quản lí danh mục ================================


        // =============================== quản lí banner ================================
        route::prefix('/quan-li-hinh-anh')->group(function(){
            route::get('/', [AdminController::class, 'banner']);
            route::post('/them', [bannerController::class, 'store']);
            Route::post('/xoa', [bannerController::class, 'delete']);
        });
        Route::post('/data-banner', [bannerController::class, 'list']);
        Route::post('/banner-detail', [bannerController::class, 'detail']);
        // =============================== quản lí banner ================================


        // =============================== quản lí đánh giá ================================
        route::prefix('/gallery')->group(function(){
            route::get('/', [AdminController::class, 'gallery']);
            route::post('/them', [galleryController::class, 'store']);
            Route::post('/xoa', [galleryController::class, 'delete']);
        });
        Route::post('/data-gallery', [galleryController::class, 'list']);
        Route::post('/gallery-detail', [galleryController::class, 'detail']);
        // =============================== quản lí đánh giá ================================


        // =============================== quản lí studio ================================
        route::prefix('/quan-li-blog')->group(function(){
            route::get('/', [AdminController::class, 'blog']);
            route::post('/them', [AdminBlogController::class, 'store']);
            Route::post('/xoa', [AdminBlogController::class, 'delete']);
        });
        Route::post('/data-blog', [AdminBlogController::class, 'list']);
        Route::post('/blog-detail', [AdminBlogController::class, 'detail']);
        // =============================== quản lí blog ================================

    });
});



