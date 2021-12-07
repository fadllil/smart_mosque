<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\web\admin\AdministratorController;
use App\Http\Controllers\web\admin\AdminMasjidController;
use App\Http\Controllers\web\admin\MasjidController;
use App\Http\Controllers\web\admin\JamaahController;

use App\Http\Controllers\web\admin_masjid\ProfilMasjidController as MasjidProfil;
use App\Http\Controllers\web\admin_masjid\PengurusController as MasjidPengurus;
use App\Http\Controllers\web\admin_masjid\JamaahController as MasjidJamaah;
use App\Http\Controllers\web\admin_masjid\JadwalImamController as MasjidJadwalImam;
use App\Http\Controllers\web\admin_masjid\KegiatanController as MasjidKegiatan;
use App\Http\Controllers\web\admin_masjid\InformasiController as MasjidInformasi;
use App\Http\Controllers\web\admin_masjid\InventarisController as MasjidInventaris;
use App\Http\Controllers\web\admin_masjid\PemasukanController as MasjidPemasukan;
use App\Http\Controllers\web\admin_masjid\PengeluaranController as MasjidPengeluaran;
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

Route::get('/', [HomeController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['prefix' => 'admin', 'middleware' => 'web.auth'], function () {
    Route::group(['prefix' => 'administrator'], function () {
        Route::get('/', [AdministratorController::class, 'index']);
        Route::post('/create', [AdministratorController::class, 'create']);
    });

    Route::group(['prefix' => 'admin_masjid'], function () {
        Route::get('/', [AdminMasjidController::class, 'index']);
        Route::post('/create', [AdminMasjidController::class, 'create']);
        Route::get('/detail/{id}', [AdminMasjidController::class, 'detail']);
        Route::get('/datatable', [AdminMasjidController::class, 'datatable']);
    });

    Route::group(['prefix' => 'masjid'], function () {
        Route::get('/', [MasjidController::class, 'index']);
        Route::post('/create', [MasjidController::class, 'create']);
        Route::get('/datatable', [MasjidController::class, 'datatable']);
        Route::get('/verifikasi/{id}', [MasjidController::class, 'verifikasi']);
    });

    Route::group(['prefix' => 'jamaah'], function () {
        Route::get('/', [JamaahController::class, 'index']);
        Route::get('/datatable', [JamaahController::class, 'datatable']);
    });
});

Route::group(['prefix' => 'admin_masjid', 'middleware' => 'web.auth'], function () {
    Route::group(['prefix' => '/profil_masjid'], function () {
        Route::get('/', [MasjidProfil::class, 'index']);
        Route::post('/update', [MasjidProfil::class, 'update']);
    });

    Route::group(['prefix' => '/pengurus_masjid'], function () {
        Route::get('/', [MasjidPengurus::class, 'index']);
        Route::get('/datatable', [MasjidPengurus::class, 'datatable']);
        Route::post('/create', [MasjidPengurus::class, 'create']);
        Route::post('/update/{id}', [MasjidPengurus::class, 'update']);
        Route::get('/delete/{id}', [MasjidPengurus::class, 'delete']);
    });

    Route::group(['prefix' => '/jamaah'], function () {
        Route::get('/', [MasjidJamaah::class, 'index']);
        Route::get('/datatable', [MasjidJamaah::class, 'datatable']);
    });

    Route::group(['prefix' => '/jadwal_imam'], function () {
        Route::get('/', [MasjidJadwalImam::class, 'index']);
        Route::post('/create', [MasjidJadwalImam::class, 'create']);
        Route::post('/update/{id}', [MasjidJadwalImam::class, 'update']);
        Route::get('/delete/{id}', [MasjidJadwalImam::class, 'delete']);
        Route::post('/jadwal/create', [MasjidJadwalImam::class, 'jadwalCreate']);
        Route::post('/jadwal/update/{id}', [MasjidJadwalImam::class, 'jadwalUpdate']);
        Route::get('/jadwal/delete/{id}', [MasjidJadwalImam::class, 'jadwalDelete']);
    });

    Route::group(['prefix' => '/kegiatan'], function () {
        Route::get('/', [MasjidKegiatan::class, 'index']);
        Route::post('/create', [MasjidKegiatan::class, 'create']);
        Route::post('/update/{id}', [MasjidKegiatan::class, 'update']);
        Route::get('/delete/{id}', [MasjidKegiatan::class, 'delete']);
        Route::get('/datatable', [MasjidKegiatan::class, 'datatable']);
    });

    Route::group(['prefix' => '/informasi'], function () {
        Route::get('/', [MasjidInformasi::class, 'index']);
        Route::post('/create', [MasjidInformasi::class, 'create']);
        Route::post('/update/{id}', [MasjidInformasi::class, 'update']);
        Route::get('/delete/{id}', [MasjidInformasi::class, 'delete']);
        Route::get('/datatable', [MasjidInformasi::class, 'datatable']);
    });

    Route::group(['prefix' => '/inventaris'], function () {
        Route::get('/', [MasjidInventaris::class, 'index']);
        Route::post('/create', [MasjidInventaris::class, 'create']);
        Route::post('/update/{id}', [MasjidInventaris::class, 'update']);
        Route::get('/delete/{id}', [MasjidInventaris::class, 'delete']);
        Route::get('/datatable', [MasjidInventaris::class, 'datatable']);
    });

    Route::group(['prefix' => '/pemasukan'], function () {
        Route::get('/', [MasjidPemasukan::class, 'index']);
        Route::post('/create', [MasjidPemasukan::class, 'create']);
        Route::get('/datatable', [MasjidPemasukan::class, 'datatable']);
    });
    Route::group(['prefix' => '/pengeluaran'], function () {
        Route::get('/', [MasjidPengeluaran::class, 'index']);
        Route::post('/create', [MasjidPengeluaran::class, 'create']);
        Route::get('/datatable', [MasjidPengeluaran::class, 'datatable']);
    });
});
