<script src="./static/lib/dhtmlxGantt/codebase/dhtmlxgantt.js" type="text/javascript" charset="utf-8"></script>
<script src="./static/lib/dhtmlxGantt/codebase/sources/ext/dhtmlxgantt_marker.js" type="text/javascript" charset="utf-8"></script><!-- Linea que marca el Dia-->
<script src="./static/lib/dhtmlxGantt/codebase/ext/dhtmlxgantt_fullscreen.js" type="text/javascript" charset="utf-8"></script>
<script src="./static/lib/dhtmlxGantt/codebase/sources/locale/locale_es.js" charset="utf-8"></script><!--Idioma -->
<link rel="stylesheet" href="./static/lib/dhtmlxGantt/codebase/dhtmlxgantt.css" type="text/css" media="screen" title="no title" charset="utf-8">

<script src="./static/lib/dhtmlxGantt/samples/common/third-party/jquery-1.11.1.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="./static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/css/bootstrap.min.css">    
<link rel="stylesheet" href="./static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/css/   ">
<script src="./static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<!--Color de Gantt -->
<script src="./static/lib/dhtmlxGantt/codebase/ext/dhtmlxgantt_quick_info.js" type="text/javascript" charset="utf-8"></script><!--Ventana emergente de Tarea -->
<script type="text/javascript" src="./static/lib/dhtmlxGantt/samples/common/testdata.js"></script>
<style type="text/css">
    html, body{ height:100%; padding:0px; margin:0px; overflow: hidden;}
    .status_line{
        background-color: #dd1010;
    }

    /*Porcentaje de Tarea Gantt*/
    .gantt_task_progress{
        text-align:right;
        padding-left:10px;
        box-sizing: border-box;
        color:white;
        font-weight: bold;
    }

    /*Color de Barras Gantt*/
    .Detenido{
    border:2px solid #d96c49;
    color: #d96c49;
    background: #d96c49;
    }
    .Detenido .gantt_task_progress{
        background: #db2536;
    }

    .Ejecutando{
        border:2px solid #34c461;
        color:#34c461;
        background: #34c461;
    }
    .Ejecutando .gantt_task_progress{
        background: #23964d;
    }

    .Terminado{
        border:2px solid #6ba8e3;
        color:#6ba8e3;
        background: #6ba8e3;
    }
    .Terminado .gantt_task_progress{
        background: #547dab;
    }

    /*filtro Tarea*/
    .filters_wrapper {
        line-height: 12px;
        font-size: 12px;
    }
    .filters_wrapper span {
        font-weight: bold;
        padding-right: 5px;
    }
    .filters_wrapper label {
        padding-right: 3px;
    }

    /*Horas no trabajadas*/
    .weekend {
        background: #f4f7f4;
    }
    .gantt_selected .weekend {
        background: #f7eb91;
    }

    .filters_wrapper {
        line-height: 12px;
        font-size: 12px;
    }
    .filters_wrapper span {
        font-weight: bold;
        padding-right: 5px;
    }
    .filters_wrapper label {
        padding-right: 3px;
    }


</style>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark bg-dark static-top">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-inverse">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="./gantt">Autosol</a>
                            <i class="fa fa-gamepad" aria-hidden="true">&nbsp;</i>
                            <img alt="Brand" src="assets/images/logos.png" class="d-inline-block align-top">
                        </div>
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">                                              
                                <li><a href="/autosol/gantt">Gantt</a></li>
                                <li><a href="/autosol/importacion">Importar Tareas</a></li>
                                <li><a href="./empleados_management">Empleados</a></li>
                                <li><a href='<?php echo site_url('tarea/tarealist')?>'>Lista de Tareas</a></li>
                                <li><a href="/autosol/filtro">Filtrado de Tareas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
     <div class="container-fluid">
        
        <div class="row">
            <div class="gantt_control" style="width: 1000px">
                <div class="filters_wrapper" id="filters_wrapper">
                    <span>Display tasks with priority:</span>        
                        <label>
                            <input type="checkbox" name="Araya" checked />
                            Araya
                        </label>
                        <label>
                            <input type="checkbox" name="Cespedes" />
                            Cespedes
                        </label>
                        <label>
                            <input type="checkbox" name="Cruz" />
                            Cruz
                        </label>
                </div>
            </div>

            <div class="col-md-pull-12">
                <div class="gantt_wrapper panel" id="gantt_here" style='width:100%; height:70%;'></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <div>
                        <a class="logo" title="AUTOSOL - Sistema de Gestion de Taller" href="">&copy; AUTOSOL - Sistema de Gestion de Taller</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- <div id="gantt_here" style='width:100%; height:100%;'></div> !-->

    <script type="text/javascript">

        fec = new Date();
        dia = fec.getDate();
        if (dia < 10)
            dia = '0' + dia;
        mes = fec.getMonth();
        if (mes < 10)
            mes = '0' + mes;
        anio = fec.getFullYear();
        hora = fec.getHours();
        min = fec.getMinutes();

        fecha = dia + '/' + mes + '/' + anio;

        gantt.templates.progress_text = function (start, end, task) {
            return "<span style='text-align:left;'>" + Math.round(task.progress * 100) + "% </span>";
        };




        //------------------Linea de Hora
        var date_to_str = gantt.date.date_to_str(gantt.config.task_date);
        var today = new Date(anio, mes, dia, hora, min);

        var start = new Date(anio, mes, dia, hora, min);
        gantt.addMarker({
            start_date: start,
            css: "status_line",
            text: "Hora del día",
            title: "Start project: " + date_to_str(start)
        });

        //Horas no Trabajadas
        gantt.templates.scale_cell_class = function (date) {
            if (date.getHours()==0||date.getHours()==1||date.getHours()==2||date.getHours()==3||date.getHours()==4||date.getHours()==5||date.getHours()==6||date.getHours()==7||date.getHours()==21||date.getHours()==22||date.getHours()==23) {
                return "weekend";
            }
        };
        gantt.templates.task_cell_class = function (item, date) {
            if (date.getHours()==0||date.getHours()==1||date.getHours()==2||date.getHours()==3||date.getHours()==4||date.getHours()==5||date.getHours()==6||date.getHours()==7||date.getHours()==21||date.getHours()==22||date.getHours()==23) {
                return "weekend"
            }
        };

        //Filtrado 
        var filter_inputs = document.getElementById("filters_wrapper").getElementsByTagName("input");
        for (var i=0; i<filter_inputs.length; i++) {
            var filter_input = filter_inputs[i];

            // attach event handler to update filters object and refresh data (so filters will be applied)
            filter_input.onchange = function() {
                gantt.refreshData();
            }
        }

        function hasPriority(parent, mecanico){
            if(gantt.getTask(parent).mecanico == mecanico)
                return true;

            var child = gantt.getChildren(parent);
            for(var i = 0; i < child.length; i++){
                if(hasPriority(child[i], mecanico))
                    return true;
            }
            return false;
        }

        gantt.attachEvent("onBeforeTaskDisplay", function(id, task){
            for (var i=0; i<filter_inputs.length; i++) {
                var filter_input = filter_inputs[i];


                if (filter_input.checked){
                    if (hasPriority(id, filter_input.name)){
                        return true;
                    }
                }

            }
            return false;
        });


//https://docs.dhtmlx.com/gantt/desktop__date_format.html
        gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
        gantt.config.step = 1;
        gantt.config.scale_unit = "hour";
        gantt.config.date_scale = "%G:%i";
        gantt.config.min_column_width = 35;
        gantt.config.duration_unit = "hour";
        gantt.config.duration_step = 1;//Ancho del Gantt
        gantt.config.scale_height = 75;

        gantt.config.subscales = [
            {unit: "day", step: 1, date: "%l %j de %F"},
            {unit: "minute", step: 30, date: "%i"}
        ];

        gantt.config.columns = [
            //{name: "mecanico", label: "Mecanico", align: "center", tree: true},        
            {name: "nroOrden", label: "Orden", width: "*"},
            {name: "vehiculo", label: "Vehiculo", align: "center"},
            {name:"mecanico",   label:"Mecanico",   align: "center", template: function (obj) {
                if (obj.mecanico == "Araya") return "Araya";
                if (obj.mecanico == "Cespedes") return "Cespedes";
                //if (obj.mecanico == "Cruz") return "Cruz";
                return "Cruz";
            }}
        ];

        //Color Barras Gantt
        gantt.templates.task_class  = function(start, end, task){
        switch (task.estado){
            case "Terminado":
                return "Terminado";
                break;
            case "Ejecutando":
                return "Ejecutando";
                break;
            case "Detenido":
                return "Detenido";
                break;
            }
        };


        //gantt.getMarker(markerId); //->{css:"today", text:"Now", id:...}
        gantt.init("gantt_here", new Date(anio, mes, dia), new Date(anio, mes, dia+2));
        gantt.load("./gantt/data", "xml");

        var dp = new dataProcessor("./gantt/data");
        dp.init(gantt);
    </script>