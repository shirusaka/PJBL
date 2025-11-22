<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KeteranganLogin;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            return redirect('/admin/dashboard');
        }
        return view ('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // login via guard default
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // log
            KeteranganLogin::create([
                'login_datetime' => now(),
                'username' => $request->username,
            ]);

            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Username atau Password Salah!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}


/*namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KeteranganLogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if (Session::has('is_login')){
            return redirect('/admin/dashboard');
        }
        return view ('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // buat nyari admin
        $admin = User::where('username', $request->username)->first();
        
        // cek pass
        if ($admin && Hash::check($request->password, $admin->password)){
            Session::put('is_login', true);
            Session::put('admin_id', $admin->id);
            Session::put('nama', $admin->nama);

            // log
            KeteranganLogin::create([
                'login_datetime' => now(),
                'username' => $admin->username,
            ]);

            return redirect('/admin/dashboard');
        }
        return back()->with('error', 'Username atau Password Salah!');
    }

    // logout
    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
*/