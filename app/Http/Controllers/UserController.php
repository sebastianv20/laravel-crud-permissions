<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id','name','email')
        ->with('Role')
        ->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            //validate
            $request->validate([
                'name' => 'required|min:3|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|max:255',
                'role' => 'required',
            ]);

            //create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> bcrypt($request->password),
            ]);

            //sync roles
            $user->syncRoles($request->role);

            return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        //validate
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        //update user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if($request->password != ''){
            $user->update([
                'password'=> bcrypt($request->password),
            ]);
        }

        //sync roles
        $user->syncRoles($request->role);

        return redirect()->route('users.index');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
