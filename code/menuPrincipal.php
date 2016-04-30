<?php

    $param = base64_decode($_GET["session"]);
    $datos = explode("|", $param);
    
    $idusr = $datos[0];
    $usuario = $datos[1];
    $nombre = $datos[2];
    $apellidos = $datos[3];
    $idperfil = $datos[4];
    $idestatus = $datos[5];
    $idpropietario = $datos[6];
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
        <script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="js/angular.js"></script>        
        <script type="text/javascript" src="js/rentas.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
    </head>
    <body>
        <form>
            <hidden id="idprop" name="idprop" ng-model="idprop" ng-init="idprop='<?php echo $datos[6] ?>'" value="{{idprop}}" />
            <hidden id="idusr" name="idusr" ng-model="idusr" ng-init="idusr='<?php echo $idusr ?>'" value="{{idusr}}" />
            <hidden id="usuario" name="usuario" ng-model="usuario" ng-init="usuario='<?php echo $usuario ?>'"  value="{{usuario}}" />
            <hidden id="nombre" name="nombre" ng-model="nombre" ng-init="nombre='<?php echo $nombre ?>'"  value="{{nombre}}" />
            <hidden id="apellidos" name="apellidos" ng-model="apellidos" ng-init="apellidos='<?php echo $apellidos ?>'" value="{{apellidos}}" />
            <hidden id="idperfil" name="idperfil" ng-model="idperfil" ng-init="idperfil='<?php echo $idperfil ?>'" value="{{idperfil}}" />
            <hidden id="idestatus" name="idestatus" ng-model="idestatus" ng-init="idestatus='<?php echo $idestatus ?>'" value="{{idestatus}}" />
            
        </form>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Navegacion</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Control de Rentas</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Usuario: <b>{{usuario}} - {{nombre}} {{apellidos}}</b> </a></li>
                    <li><a href="#">Principal</a></li>
                    <li><a href="#">Ajustes</a></li>
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Ayuda</a></li>
                    <li><a href="index.php">Salir</a></li>
                </ul>
              </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="#">Inicio<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Inmuebles</a></li>
                        <li><a href="#">Clientes</a></li>
                        <li><a href="#">Pagos</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div id="inmueblesDiv" class="container" ng-include="'pages/inmuebles.php'" >
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>