<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\Researcher;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sort = $request->query('sort') ?? 'newest';

        $researchers = Researcher::with('user')->orderBy('name')->limit(4)->get();
        $populars = Research::orderBy('views', 'desc')->with('researcher.user')->limit(4)->get();
        $researches = Research::with('researcher.user')
            ->orderBy($sort == 'popular' ? 'views' : 'published_at', 'desc')
            ->limit(4)->get();

        return view('welcome', compact('researches', 'populars', 'researchers'));
    }
}
