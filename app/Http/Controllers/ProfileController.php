<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(User $User)
    {
        return view("pages.profile", compact('User'));
    }

    public function update(User $User, Request $request)
    {
        $request->validate([
            "profile_image" => "file|image|max:2048|mimes:jpeg,jpg",
            'username' => 'required|max:10',
            'fullName' => 'required',
            'email' => 'required|email:dns',
        ]);

        $dataForm = [
            "username" => $request->username,
            "fullName" => $request->fullName,
            "email" => $request->email,
        ];

        if ($request->file('profile_image')) {
            if ($request->old_images_profile != "profile.png") {
                Storage::delete($request->old_images_profile);
            }
            $dataForm['profile_image'] = $request->file("profile_image")->store("assets/profile");
        }

        User::where("id", $User->id)->update($dataForm);

        return redirect()->to("/");
    }
}
