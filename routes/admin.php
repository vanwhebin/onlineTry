<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/admin', [DashboardController::class, 'main'])->name('admin.dashboard');
