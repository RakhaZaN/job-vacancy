<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|max:50',
            'email' => 'required|email:dns|max:100|unique:users,email',
            'password' => 'required|max:100|min:8|confirmed',
            'role' => 'in:admin,candidate',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Register Berhasil!');
        if ($validatedData['role'] == "admin") {
            return redirect(url()->previous());
        }
        return redirect()->route('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->with('error', 'Login failed. Email / Password is wrong!');

        // $getUser = User::where('email', $request['email'])->first();
        // dd($getPassword->password);

        // if (! Hash::check($request['email'], $getUser->password)) {
        //     $request->session()->flash('error', 'Email / Password is wrong');
        //     return redirect(url()->previous());
        // }

        // return redirect('/home');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }

}
