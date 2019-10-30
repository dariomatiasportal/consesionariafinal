<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas -Autosol</title>

    <?php 
        foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css')?>'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>static/lib/dhtmlxGantt/samples/common/third-party/jquery-1.11.1.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/css/bootstrap.min.css">  
<script src="<?php echo base_url(); ?>static/lib/dhtmlxGantt/samples/common/third-party/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
                            <img alt="Brand" src="<?php echo base_url(); ?>assets/images/logos.png" class="d-inline-block align-top">
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
        <div class="container">
            <div class="page-header">
                <center><h1>Gestion de Tareas - <small>Taller Autosol</small></h1></center>
            </div>
        </div>
        <div style="padding: 10px">
            <?php echo $output; ?>
        </div>
        <?php foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
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
   
    


</body>
</html>