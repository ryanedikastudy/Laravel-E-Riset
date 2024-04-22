<?php

namespace App\Http\Controllers\Researcher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Researcher\StorePatentRequest;
use App\Models\Patent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $patents = $request
            ->user()
            ->researcher->patents()
            ->when($search, function ($query, $search) use ($request) {
                $query->where('patents.title', 'like', '%' . $search . '%');
            })
            ->with('research')
            ->paginate(5)
            ->withQueryString();

        return view('researcher.patent.index', [
            'patents' => $patents,
            'search' => $search,
        ]);
    }

    /**
     * Get the search value from input and redirect to the index page
     */
    public function search(Request $request): RedirectResponse
    {
        $search = $request->input('search');
        return redirect()->route('researcher.patent.index', ['search' => $search]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $stored = $request->session()->get('temp-patent');
        if ($stored) return view('researcher.patent.confirm');

        return view('researcher.patent.create', [
            'researches' => $request->user()->researcher->researches()->get(),
        ]);
    }

    /**
     * Confirm the creation of a new resource.
     */
    public function confirm(Request $request): View | RedirectResponse
    {
        $stored = $request->session()->get('temp-patent');
        if (!$stored) return redirect()->route('researcher.patent.create');

        $request->user()->researcher->patents()->create($stored);
        $request->session()->forget('temp-patent');

        return view('researcher.patent.success');
    }

    /**
     * Cancel the creation of a new resource.
     */
    public function cancel(Request $request): View | RedirectResponse
    {
        $stored = $request->session()->get('temp-patent');
        if (!$stored) return redirect()->route('researcher.patent.create');

        Storage::delete($stored['document']);
        $request->session()->forget('temp-patent');

        return view('researcher.patent.cancel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatentRequest $request): View
    {
        $stored = $request->session()->get('temp-patent');
        if ($stored) return view('researcher.patent.confirm');

        $filename = $request->document->store('documents');
        $request->session()->put('temp-patent', array_merge(
            $request->except('document'),
            ['document' => $filename]
        ));

        return view('researcher.patent.confirm');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Patent $patent): View
    {
        return view('researcher.patent.show', [
            'user' => $request->user(),
            'patent' => $patent,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patent $patent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patent $patent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patent $patent)
    {
        //
    }
}
