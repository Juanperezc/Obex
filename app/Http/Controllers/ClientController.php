<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Client;
class ClientController extends Controller
{
    public $primaryKey = 'id';
    public function index()
    {
        return response(Client::all()->jsonSerialize(), Response::HTTP_OK);
   //   return response(Team::with(['users', 'activities'])->get()->jsonSerialize(), Response::HTTP_OK);
    }
    //
}
