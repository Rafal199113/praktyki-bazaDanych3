<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\LoginRequest;
use App\Models\Account;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request): RedirectResponse
    {
        if (Auth::attemptWhen([
            "acct_email"=>$request->acct_email,
            "password"=>$request->acct_password
        ])) {
            $request->session()->regenerate();
            $user =Auth::user();

            if($user->acct_status){
                return redirect()->route('auth.dashboard');
            }
            else
            {
                return back()->withErrors(['acct_status' => 'Masz zablokowane konto']);
            }
        }
        return back()->withErrors([
            'error' => 'Bledne dane logowania',
        ]);
    }


    public function login()
    {
        return view('authentication/login');
    }

    public function dashboard()
    {
        return view('_dashboard', ['currectUser' => Auth::user()]);
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth/login');
    }
}
