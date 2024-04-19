<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data['type_menu'] = 'user';
        $data['users'] = User::all();
        return view('pages.user.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'success');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        if ($request->password) {
            User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        } else {
            User::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        return redirect()->back()->with('success', 'success');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'success');
    }

    public function login()
    {
        return view('pages.auth-login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ], [
            'email.exist' => 'email ini belum tersedia',
            'email.required' => 'email harus diisi',
            'password.required' => 'password harus diisi',
        ]);
        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Gagal login, silahkan cek dan coba lagi!');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
