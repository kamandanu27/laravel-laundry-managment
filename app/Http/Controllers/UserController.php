<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct(User $user)
    {

        $this->middleware('auth');
        $this->middleware('role', ['only' => ['index', 'store', 'update', 'delete']]);

    }

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
        $users = User::paginate(2);

        return view('user.showUser')
            ->with('users', $users);

    }
    public function activeAdmin(Request $request)
    {
        $activation_code =config('app.activation_code');

        $role = Role::where('role', 'admin')->first();
        // return $role;
        if (empty($role) && $request->activation_code=== $activation_code) {
            $role       = new Role;
            $role->role = "admin";
            $role->save();
            $user = Auth::user();
            $user->roles()->attach($role->id);
            return back()->with('message', 'Welcome You Are Become an Admin');
            
        }

        
        // return $request->activation_code;

    }

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {

    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(Request $request)
    {

        $user                = new User;
        $user->name          = $request->name;
        $user->email         = $request->email;
        $user->password      = Hash::make($request->password);
        $user->mobile_number = $request->mobile_number;
        $user->save();
        $user->roles()->attach($request->role);

        return back()->with('message', 'User Info Save Successfully');
        // return $request;
    }

/**
 * Display the specified resource.
 *
 * @param  \App\Role  $role
 * @return \Illuminate\Http\Response
 */
    public function show(Role $role)
    {
        //
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Role  $role
 * @return \Illuminate\Http\Response
 */
    public function edit(User $User)
    {
        //
    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Role  $role
 * @return \Illuminate\Http\Response
 */
    public function update(Request $request)
    {
        $id   = $request->route('user');
        $user = User::where('id', $id)->first();
        $user->roles()->detach();
        $user->name          = $request->name;
        $user->email         = $request->email;
        $user->password      = Hash::make($request->password);
        $user->mobile_number = $request->mobile_number;
        $user->save();
        $user->roles()->attach($request->role);

        return back()->with('message', 'User Info Update Successfully');
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Role  $role
 * @return \Illuminate\Http\Response
 */
    public function destroy(Request $request)
    {
        $id   = $request->route('user');
        $type = User::find($id);
        $type->delete();
        return back()->with('message', 'User Info Delete Successfully');
    }
}
