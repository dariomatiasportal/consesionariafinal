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


    .complete_button{
        margin-top: 1px;
        background-image:url("common/v_complete.png");
        width: 20px;
    }
    .dhx_btn_set.complete_button_set{
        background: #ACCAAC;
        color: #454545;
        border: 1px solid #94AD94;
    }
    .completed_task{
        border:1px solid #94AD94;
    }
    .completed_task .gantt_task_progress{
        background: #ACCAAC;
    }

    .dhtmlx-completed{
        border-color: #669e60;
    }
    .dhtmlx-completed div {
        background: #81c97a;
    }


    .child_preview{
        box-sizing: border-box;
        margin-top: 2px;
        position: absolute;
        z-index: 1;
        color: white;
        text-align: center;
        font-size: 12px;
    }
    .gantt_task_line.task-collapsed{
        height: 4px;
        opacity: 0.25;
    }
    .gantt_task_line.gantt_project.task-collapsed .gantt_task_content{
        display: none;
    }
    .gantt_row.task-parent{
        font-weight: bold;
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
</style>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-dark bg-dark static-top">
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
        <!--<div style='height:20px; padding:5px;'>
            <div class="filters_wrapper" id="filters_wrapper">
                <span>Display tasks with priority:</span>
                <label>
                    <input type="checkbox" name="1" checked />
                    Terminado
                </label>
                <label>
                    <input type="checkbox" name="2" />
                    En Proceso
                </label>
                <label>
                    <input type="checkbox" name="3" />
                    Detenido
                </label>
            </div>
        </div>-->
    <br>
        <div class="row">
            
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


        //Marcar como completa una Tarea
        /*gantt.locale.labels["complete_button"] = "Completa";
         gantt.config.buttons_left=["dhx_save_btn","dhx_cancel_btn","complete_button"];
         
         gantt.templates.task_class=function(start,end,task){
         if (task.progress == 1)
         return "completed_task";
         return "";
         };
         
         gantt.attachEvent("onLightboxButton", function(button_id, node, e){
         if(button_id == "complete_button"){
         var id = gantt.getState().lightbox;
         gantt.getTask(id).progress = 1;
         gantt.updateTask(id)
         gantt.hideLightbox();
         }
         });
         gantt.attachEvent("onBeforeLightbox", function(id) {
         var task = gantt.getTask(id);
         if (task.progress == 1){
         dhtmlx.message({text:"La tarea a sido Completada!", type:"completed"});
         return false;
         }
         return true;
         });*/



        //------------------Linea de Hora
        var date_to_str = gantt.date.date_to_str(gantt.config.task_date);
        var today = new Date(anio, mes, dia, hora, min);
        /*gantt.addMarker({
            start_date: today,
            css: "today",
            text: "Today",
            title: "Today: " + date_to_str(today)
        });*/

        var start = new Date(anio, mes, dia, hora, min);
        gantt.addMarker({
            start_date: start,
            css: "status_line",
            text: "Hora del día",
            title: "Start project: " + date_to_str(start)
        });

        /*gantt.templates.grid_row_class = function(item){
         return item.$level==0?"gantt_project":""
         }
         gantt.templates.task_row_class = function(st,end,item){
         return item.$level==0?"gantt_project":""
         }*/



        /*Inicio Taraes retraidas */



        function createBox(sizes, class_name) {
            var box = document.createElement('div');
            box.style.cssText = [
                "height:" + sizes.height + "px",
                "line-height:" + sizes.height + "px",
                "width:" + sizes.width + "px",
                "top:" + sizes.top + 'px',
                "left:" + sizes.left + "px",
                "position:absolute"
            ].join(";");
            box.className = class_name;
            return box;
        }


        gantt.templates.grid_row_class = gantt.templates.task_class = function (start, end, task) {
            var css = [];
            if (gantt.hasChild(task.id)) {
                css.push("task-parent");
            }
            if (!task.$open && gantt.hasChild(task.id)) {
                css.push("task-collapsed");
            }

            return css.join(" ");
        };

        gantt.addTaskLayer(function show_hidden(task) {
            if (!task.$open && gantt.hasChild(task.id)) {
                var sub_height = gantt.config.row_height - 5,
                        el = document.createElement('div'),
                        sizes = gantt.getTaskPosition(task);

                var sub_tasks = gantt.getChildren(task.id);

                var child_el;

                for (var i = 0; i < sub_tasks.length; i++) {
                    var child = gantt.getTask(sub_tasks[i]);
                    var child_sizes = gantt.getTaskPosition(child);

                    child_el = createBox({
                        height: sub_height,
                        top: sizes.top,
                        left: child_sizes.left,
                        width: child_sizes.width
                    }, "child_preview gantt_task_line");
                    child_el.innerHTML = child.text;
                    el.appendChild(child_el);
                }
                return el;
            }
            return false;
        });



//    var filter_inputs = document.getElementById("filters_wrapper").getElementsByTagName("input");
    //for (var i=0; i<filter_inputs.length; i++) {
//        var filter_input = filter_inputs[i];

        // attach event handler to update filters object and refresh data (so filters will be applied)
//        filter_input.onchange = function() {
//            gantt.refreshData();
//        }
//    }

////    function hasPriority(parent, estado){
////        if(gantt.getTask(parent).estado == estado)
////            return true;
//
////        var child = gantt.getChildren(parent);
////        for(var i = 0; i < child.length; i++){
////            if(hasPriority(child[i], estado))
//                return true;
//        }
//        return false;
//    }

//    gantt.attachEvent("onBeforeTaskDisplay", function(id, task){
//        for (var i=0; i<filter_inputs.length; i++) {
//            var filter_input = filter_inputs[i];
//
//
//            if (filter_input.checked){
//                if (hasPriority(id, filter_input.name)){
//                    return true;
//                }
//            }

//        }
//        return false;
//    });





        gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
        gantt.config.step = 1;
        gantt.config.scale_unit = "hour";
        gantt.config.date_scale = "%g %a";
        gantt.config.min_column_width = 20;
        gantt.config.duration_unit = "minute";
        gantt.config.duration_step = 60;
        gantt.config.scale_height = 75;


        gantt.config.subscales = [
            {unit: "day", step: 1, date: "%j %F, %l"},
            {unit: "minute", step: 30, date: "%i"}
        ];


        gantt.config.columns = [
            //{name: "mecanico", label: "Mecanico", align: "center"},        
            {name: "text", label: "Descripcion", width: "*", tree: true},
            //{name: "start_date", label: "Comienzo", align: "center"},
            {name: "vehiculo", label: "Vehiculo", align: "center"},
            {name:"estado",   label:"Priority",   align: "center"
                //template:function(obj){
                //if (obj.estado== 1) return "Terminado";
                //if (obj.estado== 2) return "En Proceso";
                //return "Detenido";
                //if (obj.estado== "Terminado") {
                //    obj.estado=1;
                //} else {
                //    if (obj.estado== "En Proceso") {
                //        obj.estado=2;    
                //    } else {
                //        obj.estado=3;
                //    }
                //}

                //if (obj.estado== 1) return "Terminado";
                //if (obj.estado== 2) return "En Proceso";
                //return "Detenido";
        //    }
        }

        ];

        //assigns the "holders" section to a data property with the name "holder" 
        gantt.config.lightbox.sections = [
            {name:"Tarea",height:38, type:"textarea", map_to:"text", focus:true},
            {name:"Mecanico",    height:22, type:"textarea", map_to:"mecanico"},                                                                      
            {name:"time",       height:72, type:"duration", map_to:"auto"}
        ];



        //gantt.getMarker(markerId); //->{css:"today", text:"Now", id:...}
        gantt.init("gantt_here", new Date(anio, mes, dia - 1), new Date(anio, mes, dia+1));
        gantt.load("./gantt/data", "xml");

        var dp = new dataProcessor("./gantt/data");
        dp.init(gantt);
    </script>