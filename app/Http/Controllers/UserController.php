<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function create()
    {
        //function_body
        $role=UserRole::get();
        return view('user.create', compact('role'));
    }
    public function store(request $request)
    {
        //function_body
        // dd($request->all());

        $request->validate(
            [
                'username' => ['required', 'min:4'],
                'role_id' => ['required'],
                'email' => ['required', 'min:9', 'email'],
                'photo' => ['required'],
                'password' => ['required']
            ]


        );

        $user_data = User::create($request->except('photo'));
        if ($request->hasFile('photo')) {
            # code...
            $user_data->photo = Storage::put('/user', $request->file('photo'));
        }

        $user_data->save();
        return redirect()->back()->with('done', 'User Created Successfully');
    }

    public function all()
    {
        //function_body
    //    $data_array=[1,2];

        // $user_data_all=User::whereIn('id',$data_array)->with('role')->get();
        $user_data_all=User::where('status',1)->with('role')->get();
        return view('user.all',compact('user_data_all'));
    }
    public function view( $id)
    {
        //function_body
        $user_view=User::find($id);
        return view('user.view',compact('user_view'));
    }

    public function delete($id)
    {
        //function_body
        $user=User::where('id',$id)->first();
        // dd($user);
        $user->status=0;
        $user->update();

        return redirect()->back()->with('Deleted','User Deleted successfully');
    }

    public function recycle_bin()
    {
        //function_body
        $user_data_all=User::where('status',0)->with('role')->get();
        return view('user.recycle_bin',compact('user_data_all'));
    }

    public function search()
    {
        //function_body
        $search_text=$_GET['query'];
        $user_data_all=User::where('username','Like','%'.$search_text.'%')->with('role')->get();
        return view('user.search',compact('user_data_all'));
    }
}
