<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class AdminController extends Controller
{
    public function adminProfile()
    {
        return view('admin.admin');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.admin-login');
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->with('Not valid credentials');

        }
        $request->session()->regenerate();

        if (!Auth::user()->is_admin) {
            throw new AccessDeniedException('Access denied');
        }

        return redirect()->intended(route('my.posts.post', Auth::id()));

        return redirect(route(''));
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login.form'));
    }
}
