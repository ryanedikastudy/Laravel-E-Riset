<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Researcher\DashboardController as ResearcherDashboardController;
use App\Http\Controllers\Researcher\PatentController as ResearcherPatentController;
use App\Http\Controllers\Researcher\ResearchController as ResearcherResearchController;
use App\Http\Controllers\Researcher\PublicationController as ResearcherPublicationController;
use App\Models\Research;
use App\Models\Researcher;

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



Route::get('/', function () {
    $researchers = Researcher::orderBy('name')->get();
    $researches = Research::orderBy('published_at', 'desc')->get(5);

    return view('welcome', compact('researches', 'researchers'));
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([], function () {
    // 
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'researcher',
    'as' => 'researcher.',
], function () {
    Route::get('/dashboard', [ResearcherDashboardController::class, 'index'])->name('dashboard.index');

    Route::post('/research/search', [ResearcherResearchController::class, 'search'])->name('research.search');
    Route::post('/research/cancel', [ResearcherResearchController::class, 'cancel'])->name('research.cancel');
    Route::post('/research/confirm', [ResearcherResearchController::class, 'confirm'])->name('research.confirm');

    Route::resources([
        'research' => ResearcherResearchController::class,
        'publication' => ResearcherPublicationController::class,
        'patent' => ResearcherPatentController::class,
    ]);
});

require __DIR__ . '/auth.php';
