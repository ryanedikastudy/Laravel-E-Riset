<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ResearcherController;
use Illuminate\Support\Facades\Route;

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
    $researches = [
        [
            'id' => 1,
            'description' =>
            'Ujaran Kebencian Kepada Pejabat Publik di Media Sosial di Masa Pandemi Covid-19: Kajian Cyberpragmatics-forensic Linguistics',
            'author' => 'Dr. Rita Erlinda, M.Pd',
            'field' => 'Kesehatan',
            'published_at' => '2022-01-01',
            'viewed' => 1
        ],
        [
            'id' => 1,
            'description' =>
            'Ujaran Kebencian Kepada Pejabat Publik di Media Sosial di Masa Pandemi Covid-19: Kajian Cyberpragmatics-forensic Linguistics',
            'author' => 'Dr. Rita Erlinda, M.Pd',
            'field' => 'Kesehatan',
            'published_at' => '2022-01-01',
            'viewed' => 2
        ],
        [
            'id' => 1,
            'description' =>
            'Ujaran Kebencian Kepada Pejabat Publik di Media Sosial di Masa Pandemi Covid-19: Kajian Cyberpragmatics-forensic Linguistics',
            'author' => 'Dr. Rita Erlinda, M.Pd',
            'field' => 'Kesehatan',
            'published_at' => '2022-01-01',
            'viewed' => 3
        ],
        [
            'id' => 1,
            'description' =>
            'Ujaran Kebencian Kepada Pejabat Publik di Media Sosial di Masa Pandemi Covid-19: Kajian Cyberpragmatics-forensic Linguistics',
            'author' => 'Dr. Rita Erlinda, M.Pd',
            'field' => 'Kesehatan',
            'published_at' => '2022-01-01',
            'viewed' => 4
        ],
    ];

    $researchers = [
        [
            'id' => 1,
            'name' => 'Dr. Rita Erlinda, M.Pd',
            'email' => 'rieta@sumbar.go.id',
            'field' => 'Kesehatan',
        ],
        [
            'id' => 1,
            'name' => 'Dr. Rita Erlinda, M.Pd',
            'email' => 'rieta@sumbar.go.id',
            'field' => 'Kesehatan',
        ],
        [
            'id' => 1,
            'name' => 'Dr. Rita Erlinda, M.Pd',
            'email' => 'rieta@sumbar.go.id',
            'field' => 'Kesehatan',
        ],
        [
            'id' => 1,
            'name' => 'Dr. Rita Erlinda, M.Pd',
            'email' => 'rieta@sumbar.go.id',
            'field' => 'Kesehatan',
        ],
    ];

    return view('welcome', compact('researches', 'researchers'));
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group([], function () {
    Route::resource('research', ResearchController::class);
    Route::resource('researcher', ResearcherController::class);
});

require __DIR__ . '/auth.php';
