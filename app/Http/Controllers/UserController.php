<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index',compact('users'));
    }
    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role'=>['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);
        $user->save();
        return redirect()->route('users')->with('success','User created successfully');
    }
    public function edit(User $user){
        $protectedEmails = [
            'admin@correo.es', 
            'supervisor@correo.es',
            'user@correo.es',
        ];


        if (in_array($user->email, $protectedEmails)) {

            return redirect()->route('users')->withErrors(['error' => 'Este usuario esta protegido asi que no puedes editarlo.']);
        }
        return view('users.edit',compact('user'));
    }

    public function update($id,Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'role'=>'nullable|string',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        if($request->filled('role')){
            $user->syncRoles([$request->role]);
        }
        $user->save();
        return redirect()->route('users')->with('success','User updated successfully');
    }

    public function destroy(User $user){

        $protectedEmails = [
            'admin@correo.es', 
            'supervisor@correo.es',
            'user@correo.es',
        ];


        if (in_array($user->email, $protectedEmails)) {

            return redirect()->route('users')->withErrors(['error' => 'Este usuario esta protegido asi que no puedes eliminarlo.']);
        }

        $user->delete();
        return redirect()->route('users')->with('message','Usuario eliminado');
    }
}
