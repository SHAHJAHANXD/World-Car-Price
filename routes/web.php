<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FalseCeilingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleProductsController;
use App\Models\FalseCeiling;
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

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/clear-cache', [UserController::class, 'clearcache'])->name('clearcache');

Route::get('/change-country', [UserController::class, 'country'])->name('country');
Route::get('/choose-country/{id}', [UserController::class, 'change_country'])->name('change_country');

Route::get('/wallpapers', [UserController::class, 'wallpapers'])->name('wallpapers');

Route::get('/wallpapers-detail/{id}', [UserController::class, 'wallpapers_detail'])->name('wallpapers_detail');

Route::get('/get-product-of-/{category}', [UserController::class, 'productcategory'])->name('productcategory');

Route::get('/product-detail/{id}', [UserController::class, 'product_detail'])->name('product_detail');

Route::get('/product-detail-by-category/{category}', [UserController::class, 'product_detail_by_category'])->name('product_detail_by_category');

Route::get('/product-detail-by-body-type/{type}', [UserController::class, 'product_detail_by_body']);
Route::get('/product-detail-by-transmission-type/{type}', [UserController::class, 'product_detail_by_transmission']);
Route::get('/product-detail-by-drive-type/{type}', [UserController::class, 'product_detail_by_drive']);
Route::get('/product-detail-by-fuel-type/{type}', [UserController::class, 'product_detail_by_fuel']);
Route::get('/product-detail-by-capacities-type/{type}', [UserController::class, 'product_detail_by_capacities']);
Route::get('/product-detail-by-doors/{type}', [UserController::class, 'product_detail_by_doors']);

Route::get('/product-detail-by-brand/{brands}', [UserController::class, 'product_detail_by_brand'])->name('product_detail_by_brand');

Route::get('/product-detail-by-upcoming/{category}', [UserController::class, 'product_detail_by_upcoming'])->name('product_detail_by_upcoming');

Route::get('/product-detail-by-top-10/{category}', [UserController::class, 'product_detail_by_top_10'])->name('product_detail_by_top_10');

Route::prefix('administrator')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    Route::group(['middleware' => 'auth:web'], function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/users', [UserController::class, 'users'])->name('admin.users');
        Route::post('/update-profile', [UserController::class, 'updateprofile'])->name('admin.updateprofile');
        Route::get('/edit-users/{id}', [UserController::class, 'edit_users'])->name('admin.edit_users');
        Route::prefix('blog')->group(function () {
            Route::get('/category-list', [BlogController::class, 'category'])->name('blog.category_list');
            Route::post('/category-post', [BlogController::class, 'post_category'])->name('blog.post_category');

            Route::get('/list', [BlogController::class, 'list'])->name('blog.list');
            Route::delete('/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
            Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
            Route::post('/post-blog', [BlogController::class, 'post_blog'])->name('blog.post_blog');
        });
        Route::post('/edit-user', [UserController::class, 'save_edit_users'])->name('admin.save_edit_users');
        Route::post('/save-user', [UserController::class, 'save_user'])->name('admin.save_user');

        Route::get('/users-active-status/{id}', [UserController::class, 'activeuser'])->name('admin.activeuser');
        Route::get('/users-block-status/{id}', [UserController::class, 'blockuser'])->name('admin.blockuser');

        Route::get('/False-Ceiling', [UserController::class, 'FalseCeiling'])->name('admin.FalseCeiling');
        Route::get('/False-Ceiling-by-category/{category}', [UserController::class, 'FalseCeilingcategory'])->name('admin.FalseCeilingcategory');
        Route::post('/Post-False-Ceiling', [UserController::class, 'PostFalseCeiling'])->name('admin.PostFalseCeiling');

        Route::delete('/delete-Ceiling/{id}', [UserController::class, 'DeleteFalseCeiling'])->name('admin.DeleteFalseCeiling');
        Route::delete('/delete-image/{id}', [ProductController::class, 'DeleteImage'])->name('admin.DeleteImage');
        Route::get('/edit-image/{id}', [ProductController::class, 'EditImage'])->name('admin.EditImage');
        Route::post('/post-edit-image', [ProductController::class, 'PostEditImage'])->name('admin.PostEditImage');

        Route::get('/categories', [CategoryController::class, 'categories'])->name('admin.categories');
        Route::post('/post-categories', [CategoryController::class, 'post_categories'])->name('admin.post_categories');
        Route::delete('/delete-category/{id}', [CategoryController::class, 'deletecategories'])->name('admin.deletecategories');
        Route::get('/category-active-status/{id}', [CategoryController::class, 'activeCategory'])->name('admin.activeCategory');
        Route::get('/category-block-status/{id}', [CategoryController::class, 'blockCategory'])->name('admin.blockCategory');
        Route::get('/edit-category/{id}', [CategoryController::class, 'edit_categories'])->name('admin.edit_categories');
        Route::post('/post-edit-category', [CategoryController::class, 'post_edit_categories'])->name('admin.post_edit_categories');


        Route::get('/false-ceilings', [FalseCeilingController::class, 'false_ceiling'])->name('admin.false_ceiling');
        Route::post('/post-false-ceilings', [FalseCeilingController::class, 'post_false_ceiling'])->name('admin.post_false_ceiling');
        Route::delete('/delete-false-ceilings/{id}', [FalseCeilingController::class, 'deletefalse_ceiling'])->name('admin.deletefalse_ceiling');
        Route::get('/false-ceilings-active-status/{id}', [FalseCeilingController::class, 'activefalse_ceiling'])->name('admin.activeFalseCeiling');
        Route::get('/false-ceilings-block-status/{id}', [FalseCeilingController::class, 'blockfalse_ceiling'])->name('admin.blockfalse_ceiling');
        Route::get('/edit-false-ceilings/{id}', [FalseCeilingController::class, 'edit_false_ceiling'])->name('admin.edit_false_ceiling');
        Route::post('/post-edit-false-ceilings', [FalseCeilingController::class, 'post_edit_false_ceiling'])->name('admin.post_edit_false_ceiling');

        Route::post('/post-images', [ProductController::class, 'save_images'])->name('admin.save_images');


        Route::get('/brands', [BrandController::class, 'Brand'])->name('admin.Brands');
        Route::post('/post-brands', [BrandController::class, 'post_brands'])->name('admin.post_brands');
        Route::delete('/delete-brands/{id}', [BrandController::class, 'deletebrands'])->name('admin.deletebrands');
        Route::get('/brands-active-status/{id}', [BrandController::class, 'activeBrand'])->name('admin.activeBrand');
        Route::get('/brands-block-status/{id}', [BrandController::class, 'blockBrand'])->name('admin.blockBrand');
        Route::get('/edit-brands/{id}', [BrandController::class, 'edit_brands'])->name('admin.edit_brands');
        Route::post('/post-edit-brands', [BrandController::class, 'post_edit_brands'])->name('admin.post_edit_brands');

        Route::get('/products-requests', [ProductController::class, 'products_requests'])->name('admin.products_requests');
        Route::get('/products-requests-user/{id}', [ProductController::class, 'products_requests_user'])->name('admin.products_requests_user');
        Route::get('/long-description/{id}', [ProductController::class, 'products_description'])->name('admin.products_description');

        Route::get('/new-product', [ProductController::class, 'new_product'])->name('admin.new_product');
        Route::get('/products-1', [ProductController::class, 'products'])->name('admin.products1');
        Route::get('/new-products-by-category/{category}', [ProductController::class, 'new_products'])->name('admin.new_vehicle_products1');
        Route::post('/post-products-1', [ProductController::class, 'post_products'])->name('admin.post_products1');
        Route::delete('/delete-products-1/{id}', [ProductController::class, 'deleteproducts'])->name('admin.deleteproducts1');
        Route::get('/products-active-status-1/{id}', [ProductController::class, 'activeproducts'])->name('admin.activeproducts1');
        Route::get('/products-block-status-1/{id}', [ProductController::class, 'blockproducts'])->name('admin.blockproducts1');
        Route::get('/edit-products-1/{id}', [ProductController::class, 'edit_products'])->name('admin.edit_products1');
        Route::get('/edit-images-1/{id}', [ProductController::class, 'edit_Images'])->name('admin.edit_Images');
        Route::post('/post-edit-products-1', [ProductController::class, 'post_edit_products'])->name('admin.post_edit_products1');

        Route::get('/product-detail/{id}', [ProductController::class, 'product_detail'])->name('admin.product_detail');

        Route::get('/countries', [CountryController::class, 'countries'])->name('admin.countries');

        Route::get('/edit-countries/{id}', [CountryController::class, 'edit_countries'])->name('admin.edit_categories');
        Route::post('/post-edit-countries', [CountryController::class, 'post_edit_countries'])->name('admin.post_edit_countries');
    });
});
