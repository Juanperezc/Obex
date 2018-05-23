@extends('layouts.app')

@section('title', 'Main page')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1">
                            Información General</a></li>
                    <li class=""><a data-toggle="tab" href="#tab-2">Informacion Equipos
                            juegos</a></li>

                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">

                            <fieldset class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre del Proyecto:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                            placeholder="quiniela 1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tipo:</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select data-placeholder="Escoge un deporte..."
                                                class="form-control m-b" tabindex="-1">
                                                <option value="">Seleccione un Tipo</option>
                                                <option value="Futbol">Futbol</option>
                                                <option value="Beisbol">Beisbol</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripción </label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Fecha de
                                        Inicio:</label>
                                    <div class="col-sm-2">
                                        <div class="form-group" id="fecha_1">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i
                                                    class="fa fa-calendar"></i></span><input type="text"
                                                    class="form-control" value="11/05/2018"
                                                    disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Fecha de
                                        finalización:</label>
                                    <div class="col-sm-2">
                                        <div class="form-group" id="fecha_2">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i
                                                    class="fa fa-calendar"></i></span><input type="text"
                                                    class="form-control" value="11/05/2018"
                                                    disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Puntuaci�n
                                        para acierto de score del equipo ganador </label>
                                    <div class="col-sm-2">
                                        <input class="touchspin" type="text" value="0" name=""
                                            readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Puntuaci�n
                                        para acierto de score del Equipo 1 </label>
                                    <div class="col-sm-2">
                                        <input class="touchspin" type="text" value="0" name=""
                                            readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Puntuaci�n
                                        para acierto de score del Equipo 2 </label>
                                    <div class="col-sm-2">
                                        <input class="touchspin" type="text" value="0" name=""
                                            readonly="readonly">
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body">

                            <fieldset class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre del Equipo 1:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre del Equipo 2:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripci�n:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Fecha</label>
                                    <div class="col-sm-2">
                                        <div class="form-group" id="fecha_1">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i
                                                    class="fa fa-calendar"></i></span><input type="text"
                                                    class="form-control" value="11/05/2018"
                                                    disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Quantity:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                            placeholder="Quantity">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Minimum
                                        quantity:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Sort order:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="0">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Status:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    		$(document).ready(function() {
      $('#fecha_1 .input-group.date').datepicker({
        todayBtn : "linked",
        keyboardNavigation : false,
        forceParse : false,
        calendarWeeks : true,
        autoclose : true,
        format : 'dd/mm/yyyy'
    });
    $('#fecha_2 .input-group.date').datepicker({
        todayBtn : "linked",
        keyboardNavigation : false,
        forceParse : false,
        calendarWeeks : true,
        autoclose : true,
        format : 'dd/mm/yyyy'
    });
});
</script>
@endsection
