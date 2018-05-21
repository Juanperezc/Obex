<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
public function index()
{
  return response(Project::with(['teams.users', 'teams.activities'])->get()->jsonSerialize(), Response::HTTP_OK);
}
public function show($id){

  return response(Project::with(['teams.users', 'teams.activities', 'clients'])->findOrFail(1)->jsonSerialize(), Response::HTTP_OK);
}
public function destroy($id)
{
  Project::destroy($id);

  return response(null, Response::HTTP_OK);
}
/*public function update(Request $request, $id)
{
  $crud = Crud::findOrFail($id);
  $crud->color = $request->color;
  $crud->save();

  return response(null, Response::HTTP_OK);
}*/

}
