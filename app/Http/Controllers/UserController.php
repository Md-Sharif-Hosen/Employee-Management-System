<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function create()
    {
        //function_body
        $encryptedData = Crypt::encrypt('my secret data');
        $decryptedData = Crypt::decrypt($encryptedData);
        dd($decryptedData);
        $role = UserRole::get();
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
        // $last_month=Carbon::now()->subMonth(5)->month;
        //  $last_day=Carbon::now()->subMonth(1)->subDay(1)->month;
        // $start_time=Carbon::now()->subHour(8);
        // $end_time=Carbon::now()->subHour(2);




        // $user_data_all=User::whereIn('id',$data_array)->with('role')->get();
        // $user_data_all=User::where('status',1)->whereBetween('id',[1,8])->with('role')->get();
        // $user_data_all=User::where('status',1)->whereBetween('created_at',[$start_time,$end_time])->with('role')->get();
        $user_data_all = User::where('status', 1)->with('role')->get();
        return view('user.all', compact('user_data_all'));
    }
    public function view($id)
    {
        //function_body
        $user_view = User::find($id);
        return view('user.view', compact('user_view'));
    }
    public function edit($id)
    {
        //function_body

        // $user_edit = User::find($id);
        // $role = UserRole::get();
        // return view('user.edit', compact('user_edit', 'role'));
        $user = User::find($id);
        // $roles = UserRole::get();
        return response()->json([
            'status' => 200,
            'user' => $user
            // 'roles' => $roles
        ]);
    }

    public function update(request $request)
    {
        //function_body
        // request()->validate(
        //     [
        //         'username' => ['required', 'min:4'],
        //         'role_id' => ['required'],
        //         'email' => ['required', 'min:9', 'email'],
        //         'photo' => ['required'],
        //         'password' => ['required']
        //     ]


        // );

        $user_id = $request->input('id');
        $user_data = User::find($user_id);
        // dd($user_data);
        $user_data->username = request('username');
        $user_data->role_id = request('role_id');
        $user_data->email = request('email');
        # code...
        if (request()->hasFile('photo')) {

            $user_data->photo = Storage::put('/user', request()->file('photo'));
        }

        // $user_data->password = request('password');
        $user_data->update();
        return redirect()->back()->with('done', 'User Created Successfully');;
    }

    public function delete($id)
    {
        //function_body
        $user_data= User::where('id', $id)->first();
        // dd($user);
        $user_data->status = 0;
        $user_data->update();

        return redirect()->back()->with('Deleted', 'User Deleted successfully');
    }

    public function recycle_bin()
    {
        //function_body
        $user_data_all = User::where('status', 0)->with('role')->get();
        return view('user.recycle_bin', compact('user_data_all'));
    }

    public function restore($id)
    {
        //function_body
        $restore_data = User::where('id', $id)->first();
        $restore_data->status = 1;
        $restore_data->update();
        return redirect()->back()->with('restore', 'Restore Successfully');
    }


    public function search()
    {
        //function_body
        $search_text = $_GET['query'];
        $form_date = $_GET['form_date'];
        $to_date = $_GET['to_date'];
        $user_data_all = User::where('username', 'Like', '%' . $search_text . '%')->whereBetween('created_at', [$form_date, $to_date])->with('role')->get();
        return view('user.search', compact('user_data_all'));
    }

    public function all_user_search()
    {
        //function_body
        $form_date = $_GET['form_date'];
        $to_date = $_GET['to_date'];
        $user_data_all = User::whereBetween('created_at', [$form_date, $to_date])->with('role')->get();
        return view('user.user_search_date', compact('user_data_all'));
    }
}
