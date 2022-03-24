<?php

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
use App\Http\Controllers\Tool\ExcelController;
use App\Http\Controllers\Tool\Email;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/ExelModal', [ExcelController::class,"index"])->name('excelUi');
Route::post('/ExelModal_ImportBasic', [ExcelController::class,"basicImport"])->name('BasicImport');
Route::post('/ExelModal_ImportQueue', [ExcelController::class,"queueImport"])->name('importQueue');
Route::get('/ExelModal_ExportBasic', [ExcelController::class,"basicExport"])->name('exportBasic');
Route::get('/ExelModal_ExportQueue', [ExcelController::class,"queueExport"])->name('exportQueue');
Route::get('/SentMail', [Email::class,"sendMail"])->name('sendmail');
