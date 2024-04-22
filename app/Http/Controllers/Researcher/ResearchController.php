<?php

namespace App\Http\Controllers\Researcher;

use App\Models\Research;
use App\Models\ResearchType;
use Illuminate\Http\Request;
use App\Models\ResearchField;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\Researcher\StoreResearchRequest;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $researches = $request
            ->user()
            ->researcher->researches()
            ->when($search, function ($query, $search) use ($request) {
                $query->where('research.title', 'like', '%' . $search . '%')
                    ->orWhere('research.abstract', 'like', '%' . $search . '%');
            })
            ->with('researcher.user')
            ->paginate(5)
            ->withQueryString();

        return view('researcher.research.index', [
            'researches' => $researches,
            'search' => $search,
        ]);
    }

    /**
     * Get the search value from input and redirect to the index page
     */
    public function search(Request $request): RedirectResponse
    {
        $search = $request->input('search');
        return redirect()->route('researcher.research.index', ['search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $stored = $request->session()->get('temp-research');
        if ($stored) return view('researcher.research.confirm');

        return view('researcher.research.create', [
            'user' => $request->user(),
            'fields' => ResearchField::all(),
            'types' => ResearchType::all(),
        ]);
    }

    /**
     * Confirm the creation of a new resource.
     */
    public function confirm(Request $request): View | RedirectResponse
    {
        $stored = $request->session()->get('temp-research');
        if (!$stored) return redirect()->route('researcher.research.create');

        $request->user()->researcher->researches()->create($stored);
        $request->session()->forget('temp-research');

        return view('researcher.research.success', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Cancel the creation of a new resource.
     */
    public function cancel(Request $request): View | RedirectResponse
    {
        $stored = $request->session()->get('temp-research');
        if (!$stored) return redirect()->route('researcher.research.create');

        $request->session()->forget('temp-research');

        return view('researcher.research.cancel', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResearchRequest $request): View
    {
        $stored = $request->session()->get('temp-research');
        if ($stored) return view('researcher.research.confirm');

        $request->session()->put('temp-research', $request->all());

        return view('researcher.research.confirm');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Research $research): View
    {
        return view('researcher.research.show', [
            'user' => $request->user(),
            'research' => $research,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Research $research)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Research $research)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Research $research)
    {
        //
    }
}
