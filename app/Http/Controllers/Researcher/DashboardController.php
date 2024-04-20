<?php

namespace App\Http\Controllers\Researcher;

use App\Models\Researcher;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $counts = [
            'research' => $request->user()->reearcher->researches()->get()->count(),
            'publication' => $request->user()->researcher->publications()->get()->count(),
            'patent' => $request->user()->researcher->patents()->get()->count(),
        ];

        $researches = $request->user()->researcher->researches()->limit(3)->get();

        return view('researcher.dashboard.index', [
            'counts' => $counts,
            'researches' => $researches,
        ]);
    }
}
