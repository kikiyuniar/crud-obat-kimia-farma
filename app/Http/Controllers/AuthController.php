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
        if ($input['email']) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $role = Auth::user()->user_role->pluck('id_role')->toArray();
                    return redirect()->route('admin.list-itr');
            }else{
                return response()->json([
                    'success' => false,
                    'redirect' => route('login')
                ]);
            }
        }
        $fieldType = filter_var($input['nik'], FILTER_VALIDATE_EMAIL) ? 'nik' : 'username';
        if(Auth::attempt(array($fieldType => $input['nik'], 'password' => $input['password'])))
        {
            $role = Auth::user()->user_role->pluck('id_role')->toArray();

            if (in_array('1', $role)) {
                return response()->json([
                    'success' => true,
                    'redirect' => route('admin.list-itr')
                ]);
            }else if (in_array('9', $role)) {
                return response()->json([
                    'success' => true,
                    'redirect' => route('user.home')
                ]);
            }else{
                return response()->json([
                    'success' => true,
                    'redirect' => route('login')
                ]);
            }
        }else{
            return response()->json([
                'success' => false,
                'redirect' => route('login')
            ]);
        }
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
