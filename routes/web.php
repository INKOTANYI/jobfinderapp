<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::match(['get', 'post'], '/create-province', [ProvinceController::class, 'create'])->name('province.create');
Route::match(['get', 'post'], '/store-province', [ProvinceController::class, 'store'])->name('province.store');

Route::match(['get', 'post'], '/create-district', [DistrictController::class, 'create'])->name('create-district');
Route::match(['get', 'post'], '/store-district', [DistrictController::class, 'store'])->name('store-district');

Route::match(['get', 'post'], '/create-sector', [SectorController::class, 'create'])->name('create-sector');
Route::match(['get', 'post'], '/store-sector', [SectorController::class, 'store'])->name('store-sector');

Route::match(['get', 'post'], '/create-departement', [DepartementController::class, 'create'])->name('departement.create');
Route::match(['get', 'post'], '/store-departement', [DepartementController::class, 'store'])->name('departement.store');

Route::match(['get', 'post'], '/create-application', [EngineerController::class, 'index'])->name('create-application');
Route::match(['get', 'post'], '/store-engineer', [EngineerController::class, 'store'])->name('store-engineer');

Route::get('/locations', [LocationController::class, 'index']); // to load the main view
Route::get('/get-cities/{countryId}', [LocationController::class, 'getCities']); // to get cities based on country

Route::get('/get-districts/{provinceId}', [ProvinceController::class, 'getDistricts']);

Route::get('/get-district/{province_id}', [ProvinceController::class, 'getDistrict'])->name('getDistricts');

Route::get('/get-sector/{sector_id}', [DistrictController::class, 'getSector'])->name('getSectors');


// routes/web.php
Route::get('/engineers', [EngineerController::class, 'get_All'])->name('engineers.get_All');

Route::get('/engineers-by-departement', [EngineerController::class, 'getBy_Departement'])->name('engineers-by-departement');


Route::get('/sector-list', [SectorController::class, 'SearchSector'])->name('sector-list');


Route::get('/application', function () {
    return view('application');
})->name('application');


Route::get('homepage', function () {
    return view('homepage');
})->name('homepage');

Route::get('/search-engineers', [EngineerController::class, 'searchEngineers']);

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


require __DIR__ . '/auth.php';
