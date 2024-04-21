<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\http\Controllers\ResearchController as GuestResearchController;
use App\Http\Controllers\ResearcherController as GuestResearcherController;

use App\Http\Controllers\Researcher\DashboardController;
use App\Http\Controllers\Researcher\PatentController;
use App\Http\Controllers\Researcher\ResearchController;
use App\Http\Controllers\Researcher\PublicationController;

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


Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::group([
    'as' => 'research.',
    'prefix' => __('riset'),
], function () {
    Route::get('/', [GuestResearchController::class, 'index'])->name('index');
    Route::get('/{id}', [GuestResearchController::class, 'show'])->name('show');
    Route::get(__('cari'), [GuestResearchController::class, 'search'])->name('search');
});

Route::group([
    'as' => 'researcher.',
    'prefix' => __('peneliti'),
], function () {
    Route::get('/', [GuestResearcherController::class, 'index'])->name('index');
    Route::get('/{id}', [GuestResearcherController::class, 'show'])->name('show');
    Route::get(__('cari'), [GuestResearcherController::class, 'search'])->name('search');
});

Route::group([
    'as' => 'profile.',
    'prefix' => __('profil'),
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');
});

Route::group([
    'as' => 'researcher.',
    'prefix' => __('dashboard'),
    'middleware' => ['auth', 'verified'],
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group([
        'prefix' => __('riset'),
        'as' => 'research.',
    ], function () {
        Route::post(__('cari'), [ResearchController::class, 'search'])->name('search');
        Route::post(__('batal'), [ResearchController::class, 'cancel'])->name('cancel');
        Route::post(__('konfirmasi'), [ResearchController::class, 'confirm'])->name('confirm');
    });

    Route::resource(__('riset'), ResearchController::class)
        ->except(['show', 'edit', 'update', 'destroy'])
        ->names('research');

    Route::group([
        'prefix' => __('publikasi'),
        'as' => 'publication.',
    ], function () {
        Route::post(__('cari'), [PublicationController::class, 'search'])->name('search');
        Route::post(__('batal'), [PublicationController::class, 'cancel'])->name('cancel');
        Route::post(__('konfirmasi'), [PublicationController::class, 'confirm'])->name('confirm');
    });

    Route::resource(__('publikasi'), PublicationController::class)
        ->except(['show', 'edit', 'update', 'destroy'])
        ->names('publication');

    Route::group([
        'prefix' => __('paten'),
        'as' => 'patent.',
    ], function () {
        Route::post(__('cari'), [PatentController::class, 'search'])->name('search');
        Route::post(__('batal'), [PatentController::class, 'cancel'])->name('cancel');
        Route::post(__('konfirmasi'), [PatentController::class, 'confirm'])->name('confirm');
    });

    Route::resource(__('paten'), PatentController::class)
        ->except(['show', 'edit', 'update', 'destroy'])
        ->names('patent');
});

require __DIR__ . '/auth.php';
