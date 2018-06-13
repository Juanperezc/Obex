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
    public function view($id = null)
    {
      if ($id == null){
        return view('accounts/clients/index');
      }else{
        return view('accounts/clients/view', compact('id'));
      }
           
    }
    public function view_create($id = -1)
{ 
    return view('accounts/clients/save', compact('id'));
}
    public function show($id){

        return response(Client::findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
      }
      public function destroy($id)
      {
        $team = Client::destroy($id);
        return response(null, Response::HTTP_OK);
      }
      public function store(Request $request)
      {
        $a = new Client;
        $a->name = $request->input("name");
        $a->description = $request->input("description");
        $a->save();
        return $a;
      }
      public function update(Request $request)
      {

        $idedit = $request->input('edit');
        if ($idedit != 0){
          $a = Client::findOrFail($idedit);
       
          $a->name = $request->input("name");
          $a->description = $request->input("description");
          $a->save();
          return $a;
        }else{
          return response(null, Response::HTTP_ERROR);
        }
       
      }
}
