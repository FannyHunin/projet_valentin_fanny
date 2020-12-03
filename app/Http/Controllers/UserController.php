<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $userData = User::all();
        return view('pages.all_users',compact('userData'));
    }
    public function show($id){
        $userData = User::find($id);
        return view('pages.show_users',compact('userData'));
    }
    public function destroy($id){
        $userData = User::find($id);
        $userData->delete();
        return redirect('all_users');
    }
    public function edit($id){
        $avatarData = Avatar::all();
        $userData = User::find($id);
        return view('pages.edit_users', compact('userData', 'avatarData'));
    }
    public function update(Request $request, $id){
        $updateUser = User::find($id);
        $updateUser->name = $request->name;
        $updateUser->age = $request->age;
        $updateUser->email = $request->email;
        $updateUser->avatar_id = $request->avatar_id;
        $updateUser->password = $request->password;
        $updateUser->save();
        return redirect('show_users/'.$updateUser->id);
    }
}
