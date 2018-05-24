<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Team;
class TeamController extends Controller
{
    //
    public $primaryKey = 'id';
    public function index()
    {
      return response(Team::with(['users', 'activities'])->get()->jsonSerialize(), Response::HTTP_OK);
    }
}
