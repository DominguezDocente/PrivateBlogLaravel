<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AccountController extends Controller
{
    public function login() {

        return view('auth/login');
    }

    public function loginPost(LoginRequest $request) :  RedirectResponse {

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('home.index', absolute: false));
    }

    public function logout(Request $request) : RedirectResponse {

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
    public function edit()
    {
        return view('auth/profile', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'document' => 'required'
        ], [
            'first_name.required' => 'Los nombres son requeridos.',
            'last_name.required' => 'Los apellidos son requeridos.',
            'document.required' => 'El documento es requerido.',
        ])->validate();

        try {

            $user = Auth::user();

            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'document' => $request->document,
            ]);

            Session::flash('message', ['content' => 'Información actualizada con éxito', 'type' => 'success']);

            return redirect()->route('home.index');

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function changePassword() {

        return view('auth/changePassword');
    }

    public function updatePassword(Request $request)
    {
        Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ], [
            'current_password.required' => 'La contraseña actual es requerida.',
            'new_password.required' => 'La nueva contraseña es requerida.',
            'new_password.confirmed' => 'Las contraseñas no son iguales.',
        ])->validate();

        $user = Auth::user();

        try {
            if (!Hash::check($request->current_password, $user->password)) {

                Session::flash('message', ['content' => 'La contraseña actual es incorrecta', 'type' => 'error']);
                return redirect()->back();
            }

            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            Session::flash('message', ['content' => 'Tu contraseña ha sido actualizada correctamente', 'type' => 'success']);

            return redirect()->route('home.index');

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }
    }

    public function forgotPassword()
    {
        return view('auth/forgotPassword');
    }

    public function recoveryPassword(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required',
        ], [
            'email.required' => 'El Email es requerido.',
        ])->validate();

        try {

            $status = Password::sendResetLink(
                $request->only('email')
            );

            if ($status == Password::RESET_LINK_SENT) {

                Session::flash('message', ['content' => 'Se ha enviado un link de recuperación a su email', 'type' => 'success']);
                return redirect()->route('login');
            }

            if ($status === Password::RESET_THROTTLED) {

                Session::flash('message', ['content' => 'Por favor espera antes de volver a intentarlo. Intenta nuevamente en unos minutos', 'type' => 'warning']);
                return redirect()->route('login');
            }

            Session::flash('message', ['content' => $status, 'type' => 'error']);
            return redirect()->back();

        } catch(Exception $ex) {

            dd($ex);
            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }

    }

    public function resetPassword(Request $request, $token)
    {
        return view('auth.resetPassword', ['token' => $token, 'email' => $request->email]);
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);


        Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ], [
            'email.required' => 'El Email es requerido.',
            'email.required' => 'El Email es requerido.',
            'password.required' => 'La nueva contraseña es requerida.',
            'password.confirmed' => 'Las contraseñas no son iguales.',
        ])->validate();

        try {

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                        'remember_token' => Str::random(60),
                    ])->save();
                }
            );

            if ($status == Password::PASSWORD_RESET) {

                Session::flash('message', ['content' => 'Contraseña actualizada con éxito', 'type' => 'success']);
                return redirect()->route('login');
            }

            Session::flash('message', ['content' => $status, 'type' => 'error']);
            return redirect()->back();

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }
    }
}
