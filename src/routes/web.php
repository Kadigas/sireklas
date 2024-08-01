<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\PeopleCounterController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsLogin;
use Illuminate\Support\Facades\Auth;
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

Route::get('/list-reservasi',[ReservasiController::class, 'listReservasi'])->name('listReservasi');

/*User*/
Route::controller(UserController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/status', 'status')->name('status');
    Route::get('/panduan', 'panduan')->name('panduanReservasi');
    Route::get('/jadwal', 'jadwal')->name('jadwal');
    Route::get('/ruangan', 'ruanganView')->name('ruanganView');
    Route::post('api/user/fetch-ruangan','fetchruanganUser')->name('fetchruanganUser');
    Route::post('/fetch-jadwal','jadwalAjax')->name('jadwalAjax');
    Route::get('/lantai4', 'lantai4')->name('lantai4');
    Route::get('/lantai5', 'lantai5')->name('lantai5');
    Route::get('/lantai6', 'lantai6')->name('lantai6');
    Route::get('/lantai7', 'lantai7')->name('lantai7');
    Route::get('/lantai8', 'lantai8')->name('lantai8');
    Route::get('/auth', 'signIn')->name('signIn');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/logout', 'logout');
});

Route::controller(CalendarController::class)->group(function () {
    Route::post('api/fetch-ruangan','fetchruangan')->name('fetchruangan');
    Route::post('api/fetch-calendar','fetchcalendar')->name('fetchcalendar');
});

Route::controller(StaffController::class)->group(function () {
    Route::get('/staff', 'index')->name('staffDisplay');
});

/*Make Reservation*/
Route::controller(ReservasiController::class)->group(function () {
    Route::middleware([IsLogin::class])->group(function () {
        Route::get('/reservasi','stepOne')->name('reservasi');
        Route::post('/reservasipost', 'createOne')->name('postCreateStepOne');
        Route::get('/reservasi/detailPeminjaman', 'stepTwo')->name('detailPeminjaman');
        Route::post('/fetch-Ruangan','detailPeminjamanAjax')->name('detailPeminjamanAjax');
        Route::post('/check-availability','checkAvailability')->name('checkAvailability');
        Route::post('/yeybisa','selectroom')->name('selectRoom');
        Route::post('/reservasi/detailPeminjamanpost', 'createTwo')->name('postCreateStepTwo');
        Route::get('/reservasi/detailKegiatan', 'stepThree')->name('detailKegiatan');
        Route::post('/reservasi/detailKegiatanpost', 'createThree')->name('postCreateStepThree');
        Route::get('/confirmed', 'confirm')->name('confirmed');
    });
    /*List Reservasi*/
    Route::get('/list-reservasi', 'listReservasi')->name('listReservasi');
    Route::get('/detailreservasi/{id}', 'detailReservasi')->name('detail-reservasi');
    Route::post('/detailreservasi/{id}/terima', 'terima')->name('terimaReservasi');
});

/*Admin*/
Route::middleware([IsAdmin::class])->prefix('admin')->group(function() {
    Route::controller(AdminController::class)->group(function() {
        Route::get('/', 'index')->name('dashboardAdmin');
        Route::get('/view', 'testingMap')->name('testingMap');
        Route::get('file-import-export', 'fileImportExport');
        Route::post('file-import', 'fileImport')->name('file-import');
        Route::get('file-export', 'fileExport')->name('file-export');
        Route::get('/upload-petunjuk', 'uploadpetunjuk')->name('uploadPetunjuk');
        Route::post('/upload-petunjuk/post', 'uploadpdf')->name('uploadPDF');
        Route::get('/upload-jadwal', 'uploadJadwal')->name('uploadJadwal');
    });

    Route::controller(RuanganController::class)->group(function() {
        Route::get('/ruangan','index')->name('admin-ruangan');
        Route::get('/ruangan/Lantai4','lantai4')->name('admin-lantai4View');
        Route::get('/ruangan/Lantai5','lantai5')->name('admin-lantai5View');
        Route::get('/ruangan/Lantai6','lantai6')->name('admin-lantai6View');
        Route::get('/ruangan/Lantai7','lantai7')->name('admin-lantai7View');
        Route::get('/ruangan/Lantai8','lantai8')->name('admin-lantai8View');
    });

    Route::controller(ReservasiController::class)->group(function() {
        Route::get('/reservasi', 'listReservasi')->name('admin-reservasi');
        Route::get('/detailreservasi/{id}', 'detailReservasi')->name('detail-reservasi');
        Route::post('/detailreservasi/{id}/terima', 'terima')->name('terimaReservasi');
    });

    Route::controller(CalendarController::class)->group(function() {
        Route::get('jadwal', 'index')->name('admin-jadwal');
        Route::get('jadwal/Lantai1', 'lantaiSatu')->name('lantaiSatu');
        Route::post('jadwal/action', 'action');
    });

    Route::controller(ReportController::class)->group(function() {
        Route::get('report', 'month')->name('report');
        // Route::get('report/semester', 'semester')->name('viewSemester');
        // Route::get('report/month', 'month')->name('viewMonth');
        // Route::get('report/week', 'week')->name('viewWeek');
    });
});

/*Predict People*/
Route::controller(PeopleCounterController::class)->group(function () {
    Route::get('/fastapi', 'fetchAPI');
    Route::post('/uploadImage', 'uploadImage')->name('uploadImage');
    Route::get('/predict/{path}', 'countPeople')->where('path', '.*');
});