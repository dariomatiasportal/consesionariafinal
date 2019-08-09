<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
  <meta charset="utf-8">

  <title>Welcome to CodeIgniter</title>
  <!-- bootstrap -->
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- datatables css -->
  <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css">
<script src="./static/lib/dhtmlxGantt/codebase/dhtmlxgantt.js" type="text/javascript" charset="utf-8"></script>

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
                                    <li><a href="./gantt">Gantt</a></li>
                                    <li><a href="./chorarios">Importar Tareas</a></li>
                                    <li><a href="./empleado">Empleados</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tareas
                                        <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                          <li><a href="./customerslista">Asignación de Tareas</a></li>
                                          <li><a href="./customers">Filtrado de Tareas</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <div class="container">
            <div class="page-header">
                <center><h1>Gestion de Tareas - <small>Taller Autosol</small></h1></center>
            </div>
            
