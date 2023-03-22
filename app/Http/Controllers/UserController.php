<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data['page_title'] = 'User';
        $data['users'] = User::all();

        return view('user.user', $data);
    }

    public function add(){
        $data['page_title'] = 'Add User';

        return view('user.user-add', $data);
    }

    public function store(UserStoreRequest $request){
        $request->validated();
        
        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password)
        ]);

        return redirect()->route('user.index')->with('success', 'User Successfully Added');
    }

    public function edit($id){
        $data['page_title'] = 'Edit User';
        $data['user'] = User::find($id);

        return view('user.user-edit', $data);
    }

    public function update(UserUpdateRequest $request){
        $request->validated();
        $user = User::find($request->id);
        
        $user->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => $request->password != null ? Hash::make($request->password) : $user->password
        ]);

        return redirect()->route('user.index')->with('success', 'User Successfully Updated');
    }

    public function delete($id){
        User::find($id)->delete();

        return redirect()->route('user.index')->with('success', 'User Successfully Deleted');

    }

    public function getAllUsers()
    {
        try {
            $users = User::all();

            return response()->json([
                'status' => true,
                'message' => 'Success',
                'data' => $users
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed',
                'data' => []
            ], 500);
        }
    }

    public function changeVariable(){
        //inisialisasi
        $a = 5;
        $b = 3;

        //melakukan perhitungan agar variable bisa berubah nilainya
        $a = $a + $b; 
        $b = $a - $b; 
        $a = $a - $b;

        return "A = " . $a . ", B = " . $b;
    }
}
