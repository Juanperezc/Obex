<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Project;
class ProjectController extends Controller
{
    //
public function index()
{
  return response(Project::with(['teams.users', 'teams.activities'])->get()->jsonSerialize(), Response::HTTP_OK);
}

}
