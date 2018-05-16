<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class ProjectController extends Controller
{
    //
public function load()
{
  return response(Project::all()->jsonSerialize(), Response::HTTP_OK);
}
}
