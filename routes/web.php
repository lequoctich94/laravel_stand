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
use App\Http\Controllers\Tool\SimpleCrawler;
use App\Http\Controllers\Tool\ReponsitoryController;
use App\Http\Controllers\Admin\CheckAuthenUser;
use App\Http\Controllers\Tool\RelationEloquent;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
//admin
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [CheckAuthenUser::class,"index"])->name('dashboard');
//user
Route::get('/ExelModal', [ExcelController::class,"index"])->name('excelUi');
Route::post('/ExelModal_ImportBasic', [ExcelController::class,"basicImport"])->name('BasicImport');
Route::post('/ExelModal_ImportQueue', [ExcelController::class,"queueImport"])->name('importQueue');
Route::get('/ExelModal_ExportBasic', [ExcelController::class,"basicExport"])->name('exportBasic');
Route::get('/ExelModal_ExportQueue', [ExcelController::class,"queueExport"])->name('exportQueue');
Route::get('/SentMail', [Email::class,"sendMail"])->name('sendmail');
Route::get('/crawler', [SimpleCrawler::class,"index"])->name('crawler');
Route::post('/post_crawler', [SimpleCrawler::class,"post"])->name('post_crawler');
Route::get('/repository', [ReponsitoryController::class,"index"]);

//eloquent
Route::get('/eloquent', [RelationEloquent::class,"index"])->name("eloquent");


