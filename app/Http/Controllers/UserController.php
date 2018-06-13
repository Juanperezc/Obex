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

        return response(User::findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
      }
      public function destroy($id)
      {
        $team = User::destroy($id);
        return response(null, Response::HTTP_OK);
      }
      public function store(Request $request)
      {
        $a = new User;
        $a->name = $request->input("name");
        $a->description = $request->input("description");
        $a->save();
        return $a;
      }
      public function update(Request $request)
      {
        $idedit = $request->input('edit');
        if ($idedit != 0){
          $a = User::findOrFail($idedit);
       
          $a->name = $request->input("name");
          $a->description = $request->input("description");
          $a->save();
          return $a;
        }else{
          return response(null, Response::HTTP_ERROR);
        }
       
      }
 
}
