<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $protectedEmails = [
            'admin@correo.es', 
            'supervisor@correo.es',
            'user@correo.es',
        ];


        if (in_array($request->user()->email, $protectedEmails)) {

            return back()->withErrors(['error' => 'Este usuario esta protegido asi que no puedes editarlo.']);
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        $protectedEmails = [
            'admin@correo.es', 
            'supervisor@correo.es',
            'user@correo.es',
        ];


        if (in_array($request->user()->email, $protectedEmails)) {

            return back()->withErrors(['error' => 'Este usuario esta protegido asi que no puedes eliminarlo.']);
        }
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
