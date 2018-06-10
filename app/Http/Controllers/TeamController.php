<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Team;
class TeamController extends Controller
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
  return response(Team::with(['users','project', 'activities', 'work_area', 'leader'])->get()->jsonSerialize(), Response::HTTP_OK);
  
}
public function show($id){

  return response(Team::with(['users' => function ($q) {
    $q->orderBy('users.id', 'desc');
  }, 'project','activities'])->findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
}
public function destroy($id)
{
  $team = Team::destroy($id);
  return response(null, Response::HTTP_OK);
}
public function store(Request $request)
{
  $t = new Team;
  $users = $request->input('users');
  $work_area = $request->input("work_area");
  $leader = $request->input("leader");
  $t->name = $request->input("name");
  $t->description = $request->input("description");
  $t->work_area = $request->input("work_area");
  $t->description = $request->input("description");
  $t->work_area = $work_area;
  $t->leader = $leader; // tambien se puede con relaciones
  $t->save();
  $t->users()->attach($users);
  $t->save();
  return $t;
}
public function update(Request $request)
{
  $idedit = $request->input('edit');
  $work_area = $request->input("work_area");
  $leader = $request->input("leader");
  if ($idedit != 0){
    $t = Team::findOrFail($idedit);
    $users = $request->input('users');
    $t->name = $request->input("name");
    $t->description = $request->input("description");
    $t->users()->sync($users);
    $t->work_area = $work_area;
    $t->leader = $leader; // tambien se puede con relaciones
    $t->save();
    return $t;
  }else{
    return response(null, Response::HTTP_ERROR);
  }
 
}
}
