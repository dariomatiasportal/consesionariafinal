<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Tareas Terminadas-Autosol</title>
  <!-- bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- datatables css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatables/datatables.min.css'?>">
	<script src="<?php echo base_url().'static/lib/dhtmlxGantt/codebase/dhtmlxgantt.js'?>" type="text/javascript" charset="utf-8"></script>
	<?php 
	foreach($css_files as $file): ?>
	    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	    
	<?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
	    <script src="<?php echo $file; ?>"></script>
	    
	<?php endforeach; ?>
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
                <center><h1>Tareas Terminadas  - <small>Taller Autosol</small></h1></center>
            </div>
        </div>
        <div>
            <?php echo $output; ?>
        </div>
      </div>
  </body>
</html>