<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('name', 'password'))) {
            return back()->with('status', 'Invalid Login Details !');
        }

        return redirect()->route('employees');
    }
}
