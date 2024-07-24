<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.create-edit',compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->role_id = $request['role'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);

        $user->save();

        return redirect()->route('users')->with('success', 'Utilizador criado com sucesso' );
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.create-edit',compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request['name'];
        $user->role_id = $request['role'];
        $user->email = $request['email'];

        if($request['password'] != ''){
            $user->password = Hash::make($request['password']);
        }

        $user->save();

        return redirect()->route('users')->with('success', 'Utilizador criado com sucesso' );
    }

    public function delete(User $user)
    {

        $user->delete();

        return response()->json(['message' => 'Disciplina removida com sucesso.']);
    }
}
