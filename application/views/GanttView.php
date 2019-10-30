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
    html, body{ height:100%; padding:0px; margin:0px; }
        .weekend{ background: #f4f7f4 !important;}
        .gantt_selected .weekend{ background:#FFF3A1 !important; }
        .well {
            text-align: right;
        }
        @media (max-width: 991px) {
            .nav-stacked>li{ float: left;}
        }
        .container-fluid .row {
            margin-bottom: 10px;
        }
        .container-fluid .gantt_wrapper {
            height: 700px;
            width: 100%;
        }
        .gantt_container {
            border-radius: 4px;
        }
        .gantt_grid_scale { background-color: transparent; }
        .gantt_hor_scroll { margin-bottom: 1px; }


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

        /*Linea de Hora*/
    .status_line{
        background-color: #000000;
    }

    /*Lightbox*/
    #title1{
      padding-left:35px;
      color:black;
      font-weight:bold;
    }
    #title2{
      padding-left:15px;
      color:black;
      font-weight:bold;
    }
</style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar navbar-inverse">
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
                                <li><a href='<?php echo site_url('/gantt')?>'>Gantt</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">Filtro<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href='<?php echo site_url('/ganttuno')?>'>Por Orden Alfabetico</a></li>
                                        <li class="divider"></li>
                                        <li><a href='<?php echo site_url('/ganttdos')?>'>Por Mecanico</a></li>
                                    </ul>
                                </li>                                            
                                <li><a href='<?php echo site_url('/importacion')?>'>Importar Tareas</a></li>
                                <li><a href='<?php echo site_url('/empleados_management')?>'>Empleados</a></li>
                                <li><a href='<?php echo site_url('tarea/tarealist')?>'>Lista de Tareas</a></li>
                                <li><a href='<?php echo site_url('tarea/tareaterminada')?>'>Tareas Terminadas</a></li>
                                <li><a href='<?php echo site_url('/filtro')?>'>Filtrado de Tareas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="gantt_wrapper panel" id="gantt_here"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="well">
                    <div>
                        <a class="logo" title="DHTMLX - JavaScript Web App Framework &amp; UI Widgets" href="http://dhtmlx.com/docs/products/dhtmlxGantt/">&copy; DHTMLX</a>
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



//https://docs.dhtmlx.com/gantt/desktop__date_format.html
    gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
    gantt.config.step = 1;
    gantt.config.scale_unit = "hour";
    gantt.config.date_scale = "%g %a";
    gantt.config.min_column_width = 25;
    gantt.config.duration_unit = "minute";
    gantt.config.duration_step = 60;
    gantt.config.scale_height = 75;
    //gantt.config.readonly = true;

    gantt.config.subscales = [
        {unit: "day", step: 1, date: "%l %j de %F"},
        {unit: "minute", step: 30, date: "%i"}
    ];

    gantt.config.columns = [
        {name: "cliente", label: "Cliente", width: "*", tree: true},
        {name: "vehiculo", label: "Vehiculo", align: "center"},
        {name:"orden", label:"Orden",   align: "center"},
        //  {name:"mecanico", label:"Mecanico", align: "center", width : '70'},
        {name:"estado", label:"Estado", align: "center", width : '*',template: function (obj) {
            if (obj.estado=="1") return "Detenido";
            if (obj.estado=="2") return "Ejecutando";
            return "Terminado";
        }}
    ];

        //Color Barras Gantt
//        gantt.templates.task_class  = function(start, end, task){
        //switch (task.estado){
//            case "Terminado":
////////                return "Terminado";
//////                break;
//////            case "Ejecutando":
////                return "Ejecutando";
////                break;
//            case "Detenido":
//                return "Detenido";
//                break;
//            }
//        };

gantt.locale.labels.section_template = "Details";
    //https://docs.dhtmlx.com/gantt/desktop__lightbox_templates.html
    gantt.config.lightbox.sections = [
        {name: "description", height: 38, map_to: "text", type: "textarea", focus: true},
        {name:"template", height:30, type:"template", map_to:"my_template"},
        {name: "description", type: "text", map_to: "mecanico"}
    ];

    gantt.templates.time_picker = function(date){
    return gantt.date.date_to_str(gantt.config.time_picker)(date);
    };

    gantt.attachEvent("onBeforeLightbox", function(id) {
        var task = gantt.getTask(id);
        task.my_template = "<span id='title1'>Asesor: </span>"+ task.asesor+"<span id='title2'>N° de Orden: </span>"+ task.orden +" <br>";
    return true;
    });

    //Lightbox Titulo
    gantt.templates.quick_info_title = function(start, end, task){ 
       return task.my_template = "<span id='title1'>Asesor: </span>"+ task.asesor;
    };
    gantt.templates.quick_info_date = function(start, end, task){
        return null;
        //return gantt.templates.task_time(start, end, task);
    };
    //Lightbox Cuerpo
    gantt.templates.quick_info_content = function(start, end, task){ 
       return task.my_template = "<span id='title1'>Descripción: </span>"+ task.text;
    };

    gantt.init("gantt_here", new Date(anio, mes, dia,8), new Date(anio, mes, dia,21));
    gantt.load("./gantt/data", "xml");

    var dp = new dataProcessor("./gantt/data");
    dp.init(gantt);

</script>
</body>