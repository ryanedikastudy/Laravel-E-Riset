<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Researcher\DashboardController as ResearcherDashboardController;
use App\Http\Controllers\Researcher\PatentController as ResearcherPatentController;
use App\Http\Controllers\Researcher\ResearchController as ResearcherResearchController;
use App\Http\Controllers\Researcher\PublicationController as ResearcherPublicationController;
use App\Models\Research;
use App\Models\Researcher;
use Illuminate\Http\Request;

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



Route::get('/', function (Request $request) {


    $sort = $request->query('sort') || 'newest';

    $researchers = Researcher::orderBy('name')->limit(4)->get();
    $populars = Research::orderBy('views', 'desc')->limit(4)->with('researcher')->get();
    $researches = Research::with('researcher')
        ->orderBy($sort == 'popular' ? 'views' : 'created_at', 'desc')
        ->limit(4)->get();

    return view('welcome', compact('researches', 'populars', 'researchers'));
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

    Route::post('/publication/search', [ResearcherPublicationController::class, 'search'])->name('publication.search');
    Route::post('/publication/cancel', [ResearcherPublicationController::class, 'cancel'])->name('publication.cancel');
    Route::post('/publication/confirm', [ResearcherPublicationController::class, 'confirm'])->name('publication.confirm');

    Route::post('/patent/search', [ResearcherPatentController::class, 'search'])->name('patent.search');
    Route::post('/patent/cancel', [ResearcherPatentController::class, 'cancel'])->name('patent.cancel');
    Route::post('/patent/confirm', [ResearcherPatentController::class, 'confirm'])->name('patent.confirm');

    Route::resources([
        'research' => ResearcherResearchController::class,
        'publication' => ResearcherPublicationController::class,
        'patent' => ResearcherPatentController::class,
    ]);
});

require __DIR__ . '/auth.php';
