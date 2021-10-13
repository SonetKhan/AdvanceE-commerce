<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;

use App\Http\Controllers\frontend\IndexController;

use App\Http\Controllers\Backend\BrandController;
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

// Route::get('/', function () {
//     return view('frontend.main_master');
// });

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');





/*
|--------------------------------------------------------------------------
| Admin All Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');

Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');

Route::post('admin/profile/edit', [AdminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');

Route::get('admin/password/change', [AdminProfileController::class, 'changePassword'])->name('admin.change.password');

Route::post('admin/password/update', [AdminProfileController::class, 'updatePassword'])->name('admin.update.password');

/*
|--------------------------------------------------------------------------
| Frontend route
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {

    $id = Illuminate\Support\Facades\Auth::user()->id;
    $user =  App\Models\User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'index']);

Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');

Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');

Route::post('user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');

Route::get('user/change/password', [IndexController::class, 'userChangePassword'])->name('change.password');

Route::post('user/update/password', [IndexController::class, 'updatePassword'])->name('update.password');


//////////// ...................Brand route.........................


Route::prefix('brand')->group(function () {

    Route::get('/view', [BrandController::class, 'viewBrand'])->name('all.brand');

    Route::post('/store', [BrandController::class, 'storeBrand'])->name('brand.store');

    Route::get('/edit/{id}', [BrandController::class, 'editBrand'])->name('brand.edit');

    Route::post('/update', [BrandController::class, 'updateBrand'])->name('brand.update');

    Route::get('/delete/{id}', [BrandController::class, 'deleteBrand'])->name('brand.delete');
});
