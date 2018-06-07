<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Project;
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
  $obj = Project::with(['teams.users', 'activities'])->get();
  //!broma del team
  return response($obj, Response::HTTP_OK);
  
}
public function show($id){
  return response(Project::with(['teams.users' => function ($q) {
    $q->orderBy('users.id', 'desc');
  }, 'teams.activities' => function ($q) use ($id) {
    $q->whereRaw("project_id = $id");
  }, 'clients'])->findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
}
public function destroy($id)
{
  Project::destroy($id);

  return response(null, Response::HTTP_OK);
}
public function store(Request $request)
{
  $newP = $request->except(['other']);
  $client = $request->input('other.client');
  $teams = $request->input('other.teams');
  if ($idedit = $request->input("idedit") != null){
      $p = Project::find($idedit);
   // if (count($teams) > 0){
      $p->activities()->detach();
    // add team con actividad tiene que ser imborrable
    //}
  }else{
    $p = new Project;
  }

  // preguntar si existe o no/ 
 
  $p->name = $request->input("name");
  $p->description = $request->input("description");
  $p->type = $request->input("type");
  $p->start = Carbon::parse($request->input("dates")[0]);
  $p->finish = Carbon::parse($request->input("dates")[1]);
  $p->client_id = $client;
  //$p->clients()->attach($request->input(""));

  if (count($teams) > 0){
    foreach ($teams as $t) {
      $p->activities()->attach(1, ['team_id'=> $t]);
      // add team con actividad tiene que ser imborrable
    }
  }
  $p->save(); 


   return $p;
}



}
