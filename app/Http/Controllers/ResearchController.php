<?php

namespace App\Http\Controllers;

use App\Models\Research;
use App\Models\ResearchField;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $name = $request->query('name');
        $title = $request->query('title');
        $field = $request->query('field');

        $researches = Research::with('researcher.user', 'field')
            ->when($title, function ($query) use ($title) {
                $query->where('title', 'like', '%' . $title . '%');
            })
            ->when($field, function ($query) use ($field) {
                $query->where('research_field_id', '=', $field);
            })
            ->when($name, function ($query) use ($name) {
                $query->whereHas('researcher', function ($query) use ($name) {
                    $query->whereHas('user', function ($query) use ($name) {
                        $query->where('name', 'like', '%' . $name . '%');
                    });
                });
            })
            ->where('status', 'verified')
            ->orderBy('published_at', 'desc')
            ->paginate(5)
            ->withQueryString();

        return view('home.research.index', [
            'fields' => ResearchField::all(),
            'researches' => $researches,
            'query' => [
                'name' => $name,
                'title' => $title,
                'field' => $field,
            ]
        ]);
    }

    /**
     * Get the search value from input and redirect to the index page
     */
    public function search(Request $request): RedirectResponse
    {
        $name = $request->name;
        $field = $request->field;
        $title = $request->title;

        return redirect()->route('research.index', [
            'name' => $name,
            'field' => $field,
            'title' => $title,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Research $research): View
    {
        if ($research->status != 'verified') return abort(403);

        $research->update(['views' => $research->views + 1]);
        $research->save();

        $research->loadMissing('field', 'researcher');
        return view('home.research.show', compact('research'));
    }
}
