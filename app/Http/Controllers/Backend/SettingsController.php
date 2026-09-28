<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }

    public function updateAccount(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return back()->with('account_status', 'Account information updated successfully.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', PasswordRule::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('password_status', 'Password changed successfully.');
    }

    public function sendResetLink(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink([
            'email' => $request->email,
        ]);

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('reset_status', __($status));
        }

        return back()
            ->withInput()
            ->withErrors(['email' => __($status)]);
    }

    public function updateAppearance(Request $request): RedirectResponse
    {
        $request->user()->update([
            'dark_mode' => $request->boolean('dark_mode'),
        ]);

        return back()->with('appearance_status', 'Appearance settings updated successfully.');
    }

    public function updateLanguage(Request $request): RedirectResponse
    {
        $request->validate([
            'preferred_language' => ['required', 'in:en,mk,sq'],
        ]);

        $request->user()->update([
            'preferred_language' => $request->preferred_language,
        ]);

        return back()->with('language_status', 'Language preference updated successfully.');
    }
}
