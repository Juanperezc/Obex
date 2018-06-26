<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
    //
public function index()
{
  return response(User::with(['teams'])->get()->jsonSerialize(), Response::HTTP_OK);
  
}
public function view($id = null)
{
  if ($id == null){
    return view('accounts/users/index');
  }else{
    return view('accounts/users/view', compact('id'));
  }
       
}
public function view_create($id = -1)
{ 
    return view('accounts/users/save', compact('id'));
}
    public function profile()
    {
        $user = Auth::user();
        return view('profile/index',compact('user',$user));
    }

    public function update_avatar(Request $request){
 
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
 
        $user = Auth::user();
 
        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
 
        $request->avatar->storeAs('avatars',$avatarName);
 
        $user->profile_img = $avatarName;
        $user->save();
 
        return back()
            ->with('success','You have successfully upload image.');
 
    }

      public function show($id){
        return response(User::with(['teams'])->findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
      }
      public function destroy($id)
      {
        $user = User::destroy($id);
        return response(null, Response::HTTP_OK);
      }
      public function store(Request $request)
      {
        $u = new User;
        $u->name = $request->input("name");
        $u->last_name = $request->input("last_name");
        //$u->salary = $request->input("salary");
        $u->email = $request->input("email");
        $u->password = bcrypt($request->input("password"));
        $u->save();
        return $u;
      }
      public function update(Request $request)
      {
        $idedit = $request->input('edit');
        if ($idedit != 0){
          $u = User::findOrFail($idedit);
       
          $u->name = $request->input("name");
          $u->last_name = $request->input("last_name");
         // $u->salary = $request->input("salary");
          $u->email = $request->input("email");
        //  $u->password = bcrypt($request->input("password"));
          $u->save();
          return $u;
        }else{
          return response(null, Response::HTTP_ERROR);
        }
       
      }
 
}
