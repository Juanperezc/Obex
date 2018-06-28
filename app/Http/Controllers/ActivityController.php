<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Activity;

class ActivityController extends Controller
{
    //
    //? api 
public function index()
{
  //this.readOusers();
  return response(Activity::with(['team'])->get()->jsonSerialize(), Response::HTTP_OK);
  
}
public function show($id){

  return response(Activity::findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
}
public function destroy($id)
{
  $team = Activity::destroy($id);
  return response(null, Response::HTTP_OK);
}
public function store(Request $request)
{
  $a = new Activity;
  $a->name = $request->input("name");
  $a->description = $request->input("description");
  $a->save();
  return $a;
}
public function update(Request $request)
{
  $idedit = $request->input('edit');
  if ($idedit != 0){
    $a = Activity::findOrFail($idedit);
 
    $a->name = $request->input("name");
    $a->description = $request->input("description");
    $a->save();
    return $a;
  }else{
    return response(null, Response::HTTP_ERROR);
  }
}
}
