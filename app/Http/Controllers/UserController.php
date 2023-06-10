<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function create()
    {
        //function_body
        $user = User::get();

        return view('user.create', compact('user'));
    }
    public function store(request $request)
    {
        //function_body
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'min:4', 'string'],
            'role_id' => ['required'],
            'email' => ['required', 'min:9', 'email'],
            'photo' => ['required'],
            'password' => ['required']
        ]);

        $user_data = User::create($request->except('photo'));
        if ($request->hasFile('photo')) {
            # code...
            $user_data->photo = Storage::put('User/Image', $request->file('photo'));
        }

        $user_data->save();
        return redirect()->back()->with('done', 'User Created Successfully');
    }

    public function all()
    {
        //function_body
        return view('user.all');
    }
    public function view()
    {
        //function_body
        return view('user.view');
    }
}
