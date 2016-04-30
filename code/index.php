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
        <link href="css/estilo.css" rel="stylesheet" type="text/css" />
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
        
        <div class="container" ng-controller="inicioSesionController">
            <form class="form-signin">
                <h2 class="form-signin-heading">Inicio de Sesion</h2>
                <label for="inputEmail" class="sr-only">Usuario</label>
                <input ng-model="consulta.txtUsuario" type="text" id="txtUsuario" name="txtUsuario" class="form-control" placeholder="Usuario" required autofocus>
                <label for="inputPassword" class="sr-only">Contraseña</label>
                <input ng-model="consulta.txtPass" type="password" id="txtContrasena" name="txtContrasena" class="form-control" placeholder="Contrasena" required>
                <button class="btn btn-lg btn-primary btn-block" type="button" href ng-click="inicioSesion()">Iniciar Sesion</button>
            </form>
        </div>
    </body>
</html>

