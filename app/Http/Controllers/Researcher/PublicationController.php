<?php

namespace App\Http\Controllers\Researcher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Researcher\StorePublicationRequest;
use App\Models\Publication;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $publications = $request
            ->user()
            ->researcher->publications()
            ->when($search, function ($query, $search) use ($request) {
                $query->where('publications.title', 'like', '%' . $search . '%');
            })
            ->with('research')
            ->paginate(5)
            ->withQueryString();

        return view('researcher.publication.index', [
            'publications' => $publications,
            'search' => $search,
        ]);
    }

    /**
     * Get the search value from input and redirect to the index page
     */
    public function search(Request $request): RedirectResponse
    {
        $search = $request->input('search');
        return redirect()->route('researcher.publication.index', ['search' => $search]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $stored = $request->session()->get('temp-publication');
        if ($stored) return view('researcher.publication.confirm', [
            'user' => $request->user(),
            'publication' => $stored,
        ]);

        return view('researcher.publication.create', [
            'user' => $request->user(),
            'researches' => $request->user()->researcher->researches()->get(),
        ]);
    }

    /**
     * Confirm the creation of a new resource.
     */
    public function confirm(Request $request): View
    {
        $stored = $request->session()->get('temp-publication');
        if (!$stored) return redirect()->route('researcher.publication.create');

        $request->user()->researcher->publications()->create($stored);
        $request->session()->forget('temp-publication');

        return view('researcher.publication.success', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Cancel the creation of a new resource.
     */
    public function cancel(Request $request): View
    {
        $stored = $request->session()->get('temp-publication');
        if (!$stored) return redirect()->route('researcher.publication.create');

        Storage::delete($stored['document']);
        $request->session()->forget('temp-publication');

        return view('researcher.publication.cancel', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicationRequest $request): View
    {
        $filename = $request->document->store('documents');
        $stored = $request->session()->put('temp-publication', array_merge(
            $request->except('document'),
            ['document' => $filename]
        ));

        return view('researcher.publication.confirm', [
            'user' => $request->user(),
            'publication' => $stored,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publication $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        //
    }
}
