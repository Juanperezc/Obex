<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Project;
use App\Team;
class ProjectController extends Controller
{
    //
 //public $primaryKey = 'id';

public function view($id = null)
{
  if ($id == null){
    return view('projects/index');
  }else{
    return view('projects/project-detail/index', compact('id'));
  }
       
}
public function activity($id = null)
{
    return view('activities/index', compact('id'));
       
}
public function view_create($id = -1)
{ 
    return view('projects/save', compact('id'));
}
public function view_edit($id){
    $project = Project::findOrFail($id);
    if ($project)
    return view('projects/save', compact('id'));
    else
    return view('errors/404');
}
//? api 
public function index()
{
  $obj = Project::with(['teams.users', 'teams.activities'])->get();
  //!broma del team
  return response($obj, Response::HTTP_OK);
  
}
public function show($id){
  return response(Project::with(['teams.users' => function ($q) {
    $q->orderBy('users.id', 'desc');
  }, 'teams.activities', 'clients'])->findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
}
public function destroy($id)
{
  Project::destroy($id);

  return response(null, Response::HTTP_OK);
}
public function store(Request $request)
{
  $client = $request->input('other.client');
  $teams = $request->input('other.teams');
  $p = new Project;
  $p->name = $request->input("name");
  $p->description = $request->input("description");
  $p->type = $request->input("type");
  $p->start = Carbon::parse($request->input("dates")[0]);
  $p->finish = Carbon::parse($request->input("dates")[1]);
  $p->client_id = $client;
  $p->save(); 
  $tl =  Team::whereIn('id', $teams)->get();
  $p->teams()->saveMany($tl);
  $p->save(); 
   return $p;
}
public function update(Request $request)
{
  $client = $request->input('other.client');
  $teams = $request->input('other.teams');
  $idedit = $request->input('idedit');
  $p = Project::findOrFail($idedit);
  $p->name = $request->input("name");
  $p->description = $request->input("description");
  $p->type = $request->input("type");
  $p->start = Carbon::parse($request->input("dates")[0]);
  $p->finish = Carbon::parse($request->input("dates")[1]);
  $p->client_id = $client;
  //$p->save(); 
  if (count($teams) > 0){
    $tl =  Team::whereIn('id', $teams)->get();
    //$p->teams()->delete();
    $p->teams()->saveMany($tl);
  }else{
    $p->teams()->delete();
  }

  //$p->teams()->sync($teams);
  $p->save(); 
  return $p;
}



}
