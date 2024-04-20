<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/', [StoreController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});


//Admin
Route::middleware(['auth','admin'])->group(function () {

    //product
    Route::resource('products', ProductController::class);
    //category
    Route::resource('categories', CategoryController::class);
    //recherch
    Route::get('/product/search', [ProductController::class, 'search'])->name('search');

    Route::get('admin/dashbord' , function(){
        return view('espace.admin_dash');
    })->name('admin_dashbord');
});

//Editor
Route::middleware(['auth' , 'editor'])->group(function(){
    Route::get('editor/dashbord' ,[EditorController::class , 'index'])->name('editor_dashbord');
});

require __DIR__ . '/auth.php';
