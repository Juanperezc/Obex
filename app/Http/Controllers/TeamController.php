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
  return response(Team::with(['users', 'activities'])->get()->jsonSerialize(), Response::HTTP_OK);
  
}
public function show($id){

  return response(Team::with(['users' => function ($q) {
    $q->orderBy('users.id', 'desc');
  }, 'activities'])->findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
}
public function destroy($id)
{
  $team = Team::destroy($id);
  return response(null, Response::HTTP_OK);
}
public function store(Request $request)
{
  $newP = $request->except(['other']);
  //return $newP;
  $client = $request->input('other.client');
  $teams = $request->input('other.teams');

  if ($idedit = $request->input("idedit") != null){
    $p = Team::findOrFail($idedit);
     $p->activities()->detach(); // add team con actividad tiene que ser imborrable
    
  }else{
    $p = new Team;
    
  }
 
  // preguntar si existe o no/ 
 
  $p->name = $request->input("name");
  $p->description = $request->input("description");
  $p->type = $request->input("type");
  $p->start = Carbon::parse($request->input("dates")[0]);
  $p->finish = Carbon::parse($request->input("dates")[1]);
  $p->client_id = $client;
  //$p->clients()->attach($request->input(""));
  $p->save();
  foreach ($teams as $t) {
    $p->activities()->attach(1, ['team_id'=> $t]); // add team con actividad tiene que ser imborrable
  }
  $p->save();

   return $p;
}

}
