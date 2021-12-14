<?php

use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\ProfilController;
use App\Http\Controllers\api\JamaahController;
use App\Http\Controllers\api\PengurusController;
use App\Http\Controllers\api\JadwalImamController;
use App\Http\Controllers\api\KegiatanController;
use App\Http\Controllers\api\InformasiController;
use App\Http\Controllers\api\InventarisController;
use App\Http\Controllers\api\KeuanganController;
use App\Http\Controllers\api\MasjidController;
use App\Http\Controllers\api\DetailMasjidController;

/*
|--------------------------------------------------------------------------
| api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your api!
|
*/

Route::get('/user', function (Request $request) {
    return \App\Models\User::find(1);
});

Route::group(['prefix' => 'masjid','middleware' => 'jwt.auth'], function () {
    Route::group(['prefix' => 'profil'], function () {
        Route::get('/{id}', [ProfilController::class, 'index']);
        Route::post('/update', [ProfilController::class, 'update']);
    });
    Route::group(['prefix' => 'jamaah'], function () {
        Route::get('/{id}', [JamaahController::class, 'index']);
    });

    Route::group(['prefix' => 'detail'], function () {
        Route::post('/update', [MasjidController::class, 'update']);
    });

    Route::group(['prefix' => 'pengurus'], function () {
        Route::get('/{id}', [PengurusController::class, 'index']);
        Route::post('/create/{id}', [PengurusController::class, 'create']);
        Route::post('/update', [PengurusController::class, 'update']);
        Route::post('/delete', [PengurusController::class, 'delete']);
    });

    Route::group(['prefix' => 'jadwal-imam'], function () {
        Route::get('/{id}', [JadwalImamController::class, 'index']);
        Route::post('/create', [JadwalImamController::class, 'create']);
        Route::post('/update', [JadwalImamController::class, 'update']);
        Route::get('/delete/{id}', [JadwalImamController::class, 'delete']);
        Route::group(['prefix' => 'detail'], function () {
            Route::get('/{id}', [JadwalImamController::class, 'detail']);
            Route::post('/create', [JadwalImamController::class, 'createDetail']);
            Route::post('/update', [JadwalImamController::class, 'updateDetail']);
            Route::get('/delete/{id}', [JadwalImamController::class, 'deleteDetail']);
        });
    });

    Route::group(['prefix' => 'kegiatan'], function () {
        Route::get('/{id}', [KegiatanController::class, 'index']);
        Route::post('/create', [KegiatanController::class, 'create']);
        Route::post('/update', [KegiatanController::class, 'update']);
        Route::get('/delete/{id}', [KegiatanController::class, 'delete']);
        Route::get('/detail-anggota/{id}', [KegiatanController::class, 'detailAnggota']);
        Route::get('/detail-iuran/{id}', [KegiatanController::class, 'detailIuran']);
    });

    Route::group(['prefix' => 'informasi'], function () {
        Route::get('/{id}', [InformasiController::class, 'index']);
        Route::post('/create', [InformasiController::class, 'create']);
        Route::post('/update', [InformasiController::class, 'update']);
        Route::get('/delete/{id}', [InformasiController::class, 'delete']);
    });

    Route::group(['prefix' => 'inventaris'], function () {
        Route::get('/{id}', [InventarisController::class, 'index']);
        Route::post('/create', [InventarisController::class, 'create']);
        Route::post('/update', [InventarisController::class, 'update']);
        Route::get('/delete/{id}', [InventarisController::class, 'delete']);
    });

    Route::group(['prefix' => 'keuangan'], function () {
        Route::group(['prefix' => 'pemasukan'], function () {
            Route::get('/{id}', [KeuanganController::class, 'getPemasukan']);
            Route::post('/create', [KeuanganController::class, 'createPemasukan']);
            Route::post('/update', [KeuanganController::class, 'updatePemasukan']);
        });
        Route::group(['prefix' => 'pengeluaran'], function () {
            Route::get('/{id}', [KeuanganController::class, 'getPengeluaran']);
            Route::post('/create', [KeuanganController::class, 'createPengeluaran']);
            Route::post('/update', [KeuanganController::class, 'updatePengeluaran']);
        });
    });
});

Route::group(['prefix' => 'jamaah','middleware' => 'jwt.auth'], function () {
    Route::group(['prefix' => 'profil'], function () {
        Route::get('/{id}', [ProfilController::class, 'jamaah']);
        Route::post('/update', [ProfilController::class, 'updateJamaah']);
    });

    Route::group(['prefix' => 'masjid'], function () {
        Route::get('/', [MasjidController::class, 'index']);
        Route::get('/diikuti/{id}', [MasjidController::class, 'diikuti']);
        Route::get('/detail/{id}', [MasjidController::class, 'detail']);
        Route::post('/ikuti', [MasjidController::class, 'ikuti']);
    });

    Route::group(['prefix' => 'informasi'], function () {
        Route::get('/', [InformasiController::class, 'informasi']);
        Route::get('/{id}', [InformasiController::class, 'informasiJamaah']);
    });
});

Route::post('/login', [AuthController::class, 'login']);
