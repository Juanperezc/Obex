<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>@yield('title')</h2>
        <ol class="breadcrumb">
        
            @foreach (getHeading() as $a)
            <li class="{{ $a->class }}">
             {{ __("general.".$a->name) }}</a> 
            </li>
         
             @endforeach
      
        </ol>
    </div>
</div>
<!-- <!--  <a href="{{route($a->routeurl, '')}}"> -->