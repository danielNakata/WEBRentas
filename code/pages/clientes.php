<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container" ng-controller="ClientesController">
    <h1>Clientes</h1>
    <div id="listaClientes" class="panel panel-default">
        <div class="panel-heading">
            <a href="#" data-toggle="collapse" data-target="#cuerpoDiv"><h4>Lista Clientes</h4></a>
        </div>
        <div class="panel-body" ng-init="buscaCliente()">
            <label for="filtro"></label>
            <input type="text" id="filtro" name="filtro" ng-model="consulta.filtro" placeholder="ID/Nombre... " />
            <input type="hidden" id="idpropietario" name="idpropietario" ng-model="consulta.idpropietario" value="{{idpropietario}}" />
            <button class="btn btn-primary" type="button" ng-click="">Buscar</button>
            
            <table class="table table-hover">
                <tr ng-repeat="dto in listaClientes">
                    <td>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <table class="table" style="background: none">
                                    <tr>
                                        <td><a href ng-click="dto.mostrar = !dto.mostrar"><h4>{{dto.idcliente}} - {{dto.nombre}} {{dto.apellidos}}</h4></a></td>
                                        <td><a href ng-click="">Editar</a></td>
                                        <td><a href>Eliminar</a></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="panel-body" ng-show="dto.mostrar==true">
                                <table class="table">
                                    <tr>
                                        <td>{{dto.fechalta}}</td>
                                        <td>{{dto.sexo}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="nuevoCliente" class="panel panel-default">
        <div class="panel-heading">
            <a href="#"><h3>Nuevo Cliente</h3></a>
        </div>
        <div class="panel-body">
            <form>
                <table class="table">
                    <tr>
                        <td>
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" ng-model="nuevo.nombre" placeholder="Nombre(s)" />
                        </td>
                        <td>
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" ng-model="nuevo.apellidos" placeholder="Apellido(s)" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="fechanac">F. Nacimiento:</label>
                            <input type="date" class="form-control" id="fechanac" name="fechanac" ng-model="nuevo.fechanac" placeholder="AAAA-MM-DD" />
                        </td>
                        <td>
                            <label for="idsexo">Sexo:</label>
                            <select id="idsexo" name="idsexo" ng-model="nuevo.idsexo" class="form-control">
                                <option ng-repeat="sex in listaSexos2" value="{{sex.idsexo}}">{{sex.sexo}}</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <div class="container">
                    <fieldset data-ng-repeat="contacto in listaNuevoContactos">
                        <table class="table">
                            <tr>
                                <td>
                                    <label for="idtipocontacto">Contacto:</label>
                                    <select id="{{contacto.id}}"  ng-model="contacto.idtipocontacto" class="form-control">
                                        <option ng-repeat="tipoContacto in listaTipoContactos" value="{{tipoContacto.idtipocontacto}}">{{tipoContacto.tipocontacto}}</option>
                                    </select>
                                </td>
                                <td>
                                    <label for="clavecontacto">Valor:</label>
                                    <input type="text" id="clavecontacto" name="clavecontacto" ng-model="contacto.clavecontacto" class="form-control"  />
                                </td>
                                <td>
                                    <button class="btn-danger" ng-click="quitaContacto(contacto.id)">-</button>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                    <button class="btn-primary" ng-click="agregaContacto()">Agrega Contacto</button>
                </div>
                <!--
                <table class="table">
                    <fieldset data-ng-repeat="contacto in listaNuevoContactos">
                        <tr>
                            <td>
                                <label for="idtipocontacto">Contacto:</label>
                                <select id="idtipocontacto" name="idtipocontacto" ng-model="listaNuevoContactos.idtipocontacto" class="form-control">
                                    <option ng-repeat="tipoContacto in listaTipoContactos" value="{{tipoContacto.idtipocontacto}}">{{tipoContacto.tipocontacto}}</option>
                                </select>
                            </td>
                            <td>
                                <label for="clavecontacto">Valor:</label>
                                <input type="text" id="clavecontacto" name="clavecontacto" ng-model="contacto.clavecontacto" class="form-control"  />
                            </td>
                        </tr>
                    </fieldset>
                    <tr>
                        <td>
                            <button class="btn-primary" ng-click="agregaContacto()">Agrega Contacto</button>
                        </td>
                    </tr>
                </table>
                -->
                <!--
                <table class="table">
                    <tr>
                        <td>
                            <label for="calle">Calle:</label>
                            <input type="text" id="calle" name="calle" ng-model="nuevo.calle" class="form-control" />
                        </td>
                        <td>
                            <label for="numeroext">Num. Ext:</label>
                            <input type="text" id="numeroext" name="numeroext" ng-model="nuevo.numeroext" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="numeroint">Num. Int:</label>
                            <input type="text" id="numeroint" name="numeroint" ng-model="nuevo.numeroint" class="form-control" />
                        </td>
                        <td>
                            <label for="codpost">Cod. Postal:</label>
                            <input type="text" id="codpost" name="codpost" ng-model="nuevo.codpost" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="colonia">Colonia:</label>
                            <input type="text" id="colonia" name="colonia" ng-model="nuevo.colonia" class="form-control" />
                        </td>
                        <td>
                            <label for="colonia">Del/Mun:</label>
                            <input type="text" id="delmun" name="delmun" ng-model="nuevo.delmun" class="form-control" />
                        </td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td>
                            <label for="nombreaval">Aval Nombre:</label>
                            <input type="text" id="nombreaval" name="nombreaval" ng-model="nombreaval" class="form-control" />
                        </td>
                        <td>
                            <label for="nombreaval">Aval Apellidos:</label>
                            <input type="text" id="apellidosaval" name="apellidosaval" ng-model="apellidosaval" class="form-control" />
                        </td>
                    </tr>
                </table>
                -->
                <table class="table">
                    <tr>
                        <td colspan="3"></td>
                        <td><button class="btn bg-primary" ng-click="nuevoCliente()" >Guardar</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

