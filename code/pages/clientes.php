<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container" ng-controller="ClientesController">
    <h1>Clientes</h1>
    
    <div id="nuevoCliente" class="panel panel-default">
        <div class="panel-heading">
            <a href="#"><h3>Nuevo Cliente</h3></a>
        </div>
        <div class="panel-body">
            <form>
                <table class="table">
                    <tr>
                        <td colspan="2">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" ng-model="nuevo.nombre" placeholder="Nombre(s)" />
                        </td>
                        <td colspan="2">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" ng-model="nuevo.apellidos" placeholder="Apellido(s)" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fechanac">F. Nacimiento:</label>
                            <input type="date" class="form-control" id="fechanac" name="fechanac" ng-model="nuevo.fechanac" placeholder="DD/MM/AAAA" />
                        </td>
                        <td>
                            <label for="idsexo">Sexo:</label>
                            <select id="idsexo" name="idsexo" ng-model="nuevo.idsexo" class="form">
                                <option ng-repeat="sex in $scope.listaSexos" value="{{sex.idsexo}}">{{sex.sexo}}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td><button class="btn btn-default" ng-click="nuevoCliente()" value="Guardar">Guardar</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

