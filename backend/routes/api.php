<?php 

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\API\AuthController; 
use App\Http\Controllers\API\PengembalianController;

// Public Routes (Tidak perlu token) 
Route::post('/register', [AuthController::class, 'register']); 
Route::post('/login', [AuthController::class, 'login']); 

// Protected Routes (Wajib membawa Bearer Token dari Sanctum) 
Route::middleware('auth:sanctum')->group(function () { 
    Route::post('/me', [AuthController::class, 'me']); 
    Route::post('/logout', [AuthController::class, 'logout']); 

    // Route Pengembalian yang bisa diakses bersama (Admin, Petugas, Peminjam)
    Route::get('/pengembalian', [PengembalianController::class, 'index']);
    Route::get('/pengembalian/{pengembalian}', [PengembalianController::class, 'show']);

    Route::middleware('role.admin')->group(function () { 
        // Route untuk hak akses admin 
    }); 
    
    Route::middleware('role.petugas')->group(function () { 
        // Route untuk aksi pengolahan pengembalian oleh petugas
        Route::post('/pengembalian', [PengembalianController::class, 'store']);
        Route::put('/pengembalian/{pengembalian}', [PengembalianController::class, 'update']);
        Route::delete('/pengembalian/{pengembalian}', [PengembalianController::class, 'destroy']);
    }); 
    
    Route::middleware('role.peminjam')->group(function () { 
        // Route untuk hak akses peminjam 
    }); 
});