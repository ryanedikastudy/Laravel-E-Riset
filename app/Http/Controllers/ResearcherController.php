<?php

namespace App\Http\Controllers;

use App\Models\Researcher;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ResearcherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $name = $request->query('name');
        $count = $request->query('count');
        $nationality = $request->query('nationality');

        $researchers = Researcher::with('researches', 'user')
            ->withCount('researches')
            ->where('status', 'verified')
            ->when($name, function ($query) use ($name) {
                $query->whereHas('user', function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                });
            })
            ->when($nationality, function ($query) use ($nationality) {
                $query->where('nationality', 'like', '%' . $nationality . '%');
            })
            ->when($count, function ($query) use ($count) {
                $query->has('researches', '>=', $count);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('home.researcher.index', [
            'researchers' => $researchers,
            'query' => [
                'name' => $name,
                'count' => $count,
                'nationality' => $nationality,
            ]
        ]);
    }

    /**
     * Get the search value from input and redirect to the index page
     */
    public function search(Request $request): RedirectResponse
    {
        $name = $request->name;
        $count = $request->count;
        $nationality = $request->nationality;

        return redirect()->route('researcher.index', [
            'name' => $name,
            'count' => $count,
            'nationality' => $nationality,
        ]);
    }
}
