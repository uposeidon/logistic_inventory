<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       $users = User::all()->where('roles', ['ROLE_USER']);
       return view('admin.users.index',compact("users"));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','string', 'max:255'],
            'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','string', 'min:8', 'confirmed'],
            'is_active' => 'required|boolean',
        ]);
       
        if($validator->fails()) {
            return redirect()->route('admin.users.create')
                        ->withErrors($validator)
                        ->withInput();
        }
            
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_active' => $request->boolean('is_active'),
            'roles' => ['ROLE_USER']
        ];
       
        User::create($data);
        return redirect()->route('admin.users.index')->with('success', 'User Created Successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','string', 'max:255'],
            'email' => ['required','string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'password' => ['nullable','string', 'min:8', 'confirmed'],
            'is_active' => 'required|boolean',
        ]);
       
        if($validator->fails()) {
            return redirect()->route('admin.users.edit',$id)
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'is_active' => $request->boolean('is_active')
        ];
        if(!empty($request->input('password'))){
            $data = array_merge(['password' => Hash::make($request->input('password'))],$data);
        }
        User::where('id',$id)->update($data);
        return redirect()->route('admin.users.index')->with('success', 'User Updated Successfully!');
    }

    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'User Deleted Successfully!');
    }
}
