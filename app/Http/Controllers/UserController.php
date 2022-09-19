<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    public function login() {
        return view('user.login');
    }

    public function register() {
        return view('user.register');
    }

    public function show() {
        $user = Auth::user();
        $user_id = Auth::id();
        $postVoices = Voice::where("user_id", "=", $user_id)->latest()->get();
        $param = [
            'user' => $user,
            'postVoices' => $postVoices,
        ];
        return view("user", $param);
    }

    public function edit(Request $request) {
        $user = Auth::user();
        return view("user.edit", ['user' => $user]);
    }


    public function update(Request $request) {
        $rules = [
            'name' => 'required',
        ];

        $message = [
            'editname.required' => '名前(ニックネーム)を入力してください。',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->route('edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User;
        $edit_form = $request->all();
        unset($edit_form['_token']);

        // $dir = 'icons';

        $icon_image = $request->file('icon_image');
        $icon_image_path = $icon_image->store('icons',"public");

        if ($icon_image_path) {
            $icon_image_name = $icon_image->getClientOriginalName();
        }
        // $request->file('icon_image')->storeAs('public/' . $dir, $icon_image_name);

        $user->icon_image_name = $icon_image_name;
        $user->name = $request->name;
        $user->profile = $request->profile;
        $user->save();
        return redirect()->route("user");
    }

}
