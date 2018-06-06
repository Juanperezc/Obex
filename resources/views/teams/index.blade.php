@extends('layouts.app')

@section('title', 'Equipos')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
         
            <div class="wrapper wrapper-content animated fadeInRight">
                 <div class="col-lg-12">
                  
                <!-- llamar team component -->
              <teams-table></teams-table>
                
            
            </div>


        </div>
          
        </div>
    </div>
@endsection

