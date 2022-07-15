<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("pages.register");
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|Unique:users|max:10',
            'fullName' => 'required',
            'email' => 'required|email:dns|Unique:users',
            'password' => 'required|min:4|same:confirm-password',
            'confirm-password' => 'required|same:password'
        ]);

        $formData = [
            "username" => $request->username,
            "fullName" => $request->fullName,
            "email" => $request->email,
            // "password" => bcrypt($request->password),
            "password" => Hash::make($request->password)
        ];

        User::create($formData);

        return redirect()->to("/login")->with("success_message", "user account created");
    }
}
