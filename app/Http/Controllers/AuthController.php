<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('auth.login');
    }

    public function actionLogin(Request $request)
    {
        $input = $request->all();
        if ($request->username) {
            if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
                return redirect('dashboard');
            }
        }
        $fieldType = filter_var($input['username'], FILTER_VALIDATE_EMAIL) ? 'username' : 'username';
        if(Auth::attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
            return redirect('dashboard');
        }else{
            return redirect()->back()->with('danger', 'Email/Password Salah ');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function viewRegister(Request $request)
    {
        return view('auth.register');
    }

    public function actionRegister(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'username'  => 'required|unique:users|min:5',
            'email'     => 'required|unique:users'
        ],
        [
            'name.required'         => 'Kolom nama wajib diisi',
            'username.required'     => 'Kolom username wajib diisi',
            'username.min'          => 'Kolom username minimal 5 huruf',
            'username.unique'       => 'Username sudah digunakan',
            'email.required'        => 'Kolom email wajib diisi',
            'email.unique'          => 'Email sudah digunakan',
        ]);

        $tambah = new User();
        $tambah->name           = $request->name;
        $tambah->email           = $request->email;
        $tambah->username       = strtolower($request->username);
        $tambah->password       = Hash::make($request->password);
        $tambah->save();

        return redirect('login');
    }
}
