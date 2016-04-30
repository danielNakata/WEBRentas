<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!doctype html>
<html lang="es" ng-app="rentas">
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Administracion de Arrendamientos</title>
        <link href="css/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="css/dashboard.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="js/angular.js"></script>        
        <script type="text/javascript" src="js/rentas.js"></script>
    </head>
    <body>
        <hidden id="idusr" name="idusr" ng-model="idusr" ng-init="idusr=1" value="{{idusr}}" />
        <hidden id="usuario" name="usuario" ng-model="usuario" ng-init="usuario=''" value="{{usuario}}" />
        <hidden id="nombre" name="nombre" ng-model="nombre" ng-init="nombre=''" value="{{nombre}}" />
        <hidden id="apellidos" name="apellidos" ng-model="apellidos" ng-init="apellidos=''" value="{{apellidos}}" />
        <hidden id="idperfil" name="idperfil" ng-model="idperfil" ng-init="idperfil=0" value="{{idperfil}}" />
        <hidden id="idestatus" name="idestatus" ng-model="idestatus" ng-init="idestatus=0" value="{{idestatus}}" />
        <hidden id="idpropietario" name="idpropietario" ng-model="idpropietario" ng-init="idpropietario=0" value="{{idpropietario}}" />
        
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project name</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Dashboard</a></li>
                  <li><a href="#">Settings</a></li>
                  <li><a href="#">Profile</a></li>
                  <li><a href="#">Help</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                  <input type="text" class="form-control" placeholder="Search...">
                </form>
              </div>
            </div>
        </nav>
        
    </body>
</html>

