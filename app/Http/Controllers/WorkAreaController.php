<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Work_Area;
class WorkAreaController extends Controller
{

 //   public $primaryKey = 'id';
public function view($id = null)
{
  if ($id == null){
    return view('teams/index');
  }else{
    return view('teams/detail', compact('id'));
  }
       
}
public function view_create($id = null)
{

    return view('teams/save', compact('id'));

  
}
public function view_edit($id = null){
  $team = Team::findOrFail($id);
    if ($team)
    return view('teams/save', compact('id'));
    else
    return view('errors/404');
}

//? api 
public function index()
{
  //this.readOusers();
  return response(Work_Area::get()->jsonSerialize(), Response::HTTP_OK);
  
}
public function show($id){

  return response(Work_Area::findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
}
public function destroy($id)
{
  $team = Work_Area::destroy($id);
  return response(null, Response::HTTP_OK);
}
public function store(Request $request)
{
  $a = new Work_Area;
  $a->name = $request->input("name");
  $a->description = $request->input("description");
  $a->save();
  return $a;
}
public function update(Request $request)
{
  $idedit = $request->input('edit');
  if ($idedit != 0){
    $a = Work_Area::findOrFail($idedit);
 
    $a->name = $request->input("name");
    $a->description = $request->input("description");
    $a->save();
    return $a;
  }else{
    return response(null, Response::HTTP_ERROR);
  }
 
}
}
