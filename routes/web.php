<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


// Frontend Start
Route::get('/', [HomeController::class, 'index'])->name('home');
// Frontend End

// Backend Start
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/admin/dashboard/create', [ProductController::class, 'create'])->name('admin.dashboard.create');
Route::post('/admin/dashboard/store', [ProductController::class, 'store'])->name('admin.dashboard.store');
Route::get('/admin/dashboard/index', [ProductController::class, 'index'])->name('admin.dashboard.index');
Route::get('/admin/dashboard/edit/{id}', [ProductController::class, 'edit'])->name('admin.dashboard.edit');
Route::post('/admin/dashboard/update/{id}', [ProductController::class, 'update'])->name('admin.dashboard.update');
Route::get('/admin/dashboard/delete/{id}', [ProductController::class, 'delete'])->name('admin.dashboard.delete');
// Backend End
