<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'researcher' => $request->user()->researcher,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->hasFile('photo')) {
            if ($request->user()->photo) {
                Storage::delete($request->user()->photo);
            }

            $filename = $request->photo->store('photos');
            $request->user()->photo = $filename;
            $request->user()->save();
        }

        $request->user()->researcher->update($request->except('name', 'photo'));
        $request->user()->researcher->save();

        $request->user()->update($request->only('name', 'photo'));
        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', __('Data peneliti berhasil diperbarui.'));
    }
}
