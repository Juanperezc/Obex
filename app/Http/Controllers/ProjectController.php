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
    public $primaryKey = 'id';

public function view($id = null)
{
  if ($id == null){
    return view('projects/index');
  }else{
    return view('projects/project-detail/index', compact('id'));
  }
       
}
public function view_create()
{
  return view('projects/save');
}
public function index()
{
  return response(Project::with(['teams.users', 'teams.activities'])->get()->jsonSerialize(), Response::HTTP_OK);
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
  //$other = $request->only(['other']);
  $newP = $request->except(['other']);
  //return $newP;
  $client = $request->input('other.client');
  $teams = $request->input('other.teams');

  $p = new Project;
  $p->name = $request->input("name");
  $p->description = $request->input("description");
  $p->type = $request->input("type");
  $p->start = Carbon::parse($request->input("start"));
  $p->finish = Carbon::parse($request->input("finish"));
  $p->client_id = $client;

  //$p->clients()->attach($request->input(""));
  $p->save();
  $p->teams()->attach($teams);
  $p->save();
  /*
  $p = new Project;
  $p->name = "s";
  $p->description = "sad";
  $p->type = "web-design";
  $p->start = "20-10-2018";
  $p->finish = "21-10-2018";
  $p->save();*/
 //  $project = Project::create({name: "asdasdasd", type: "web-design", description: "asdasdasd", start: "2018-05-07T04:00:00.000Z", finish: "2018-05-19T04:00:00.000Z"});
   //$project->clients()->attach($client);
   //$project->teams()->attach($teams);

  /* return response()->json([
    'name' => $teams,
    'state' => 'CA'
]);*/
   // $company = Company::create($request->all());
   return $p;
}

/*public function update(Request $request, $id)
{
  $crud = Crud::findOrFail($id);
  $crud->color = $request->color;
  $crud->save();

  return response(null, Response::HTTP_OK);
}*/

}
