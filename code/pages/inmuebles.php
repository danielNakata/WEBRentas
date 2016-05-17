<?php

/* 
 * Pagina para los inmuebles
 */
?>
<div class="container" ng-controller="inmueblesController" >
    <h1 class="h1">Inmuebles</h1>
    <div id="listaInmueble" class="panel panel-default">
        <div class="panel-heading">
            <a href="#" data-toggle="collapse" data-target="#cuerpoDiv"><h4>Lista Inmuebles</h4></a>
        </div>
        <div class="panel-body" ng-init="buscaInmuebles()" >
            <label for="filtro"></label>
            <input type="text" id="filtro" name="filtro" ng-model="consulta.filtro" placeholder="ID/Descripcion... " />
            <input type="hidden" id="idpropietario" name="idpropietario" ng-model="consulta.idpropietario" value="{{idpropietario}}" />
            <button class="btn btn-primary" type="button" ng-click="buscaInmuebles()">Buscar</button>
            
            <table class="table table-hover">
                <tr ng-repeat="dto in listaInmuebles">
                    <td>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <table class="table" style="background: none">
                                    <tr>
                                        <td><a href ng-click="dto.mostrar = !dto.mostrar"><h4>{{dto.idinmueble}} - {{dto.descripcion}}</h4></a></td>
                                        <td><a href ng-click="editaInformacion(dto)">Editar</a></td>
                                        <td><a href>Eliminar</a></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="panel-body" ng-show="dto.mostrar==true">
                                <table class="table">
                                    <tr>
                                        <th>Renta</th><th>Deposito</th><th>Estatus</th><th>Tipo Renta</th>
                                    </tr>
                                    <tr>
                                        <td>{{dto.montorenta | number:2}}</td><td>{{dto.deposito | number:2}}</td>
                        <td>{{dto.estatus}}</td><td>{{dto.tiporenta}}</td>
                                    </tr>
                                    <tr>
                                        <th>Calle</th><th>NumExt</th><th>NumInt</th><th>CP</th>
                                    </tr>
                                    <tr>
                                        <td>{{dto.calle}}</td><td>{{dto.numext}}</td><td>{{dto.numint}}</td>
                        <td>{{dto.codpost}}</td>
                                    </tr>
                                    <tr>
                                        <th>Colonia</th><th>Del/Mun</th><th>Estado</th><th></th>
                                    </tr>
                                    <tr>
                                        <td>{{dto.colonia}}</td><td>{{dto.delmun}}</td><td>{{dto.estado}}</td><td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
    </div>
    <div id='nuevoInmueble' class="panel panel-default">
        <div class="panel-heading">
            <a href="#" data-toggle="collapse" data-target="#cuerpoDiv"><h4>Nuevo Inmueble</h4></a>
        </div>
        <div class="panel-body">
            <table class="table">
                <form>
                    <tr>
                        <td colspan="2">
                            <label for="descripcion">Descripcion:</label>
                            <input id="descripcion" name="descripcion" type="text" class="form-control" ng-model="nuevo.descripcion" placeholder="Descripcion" value="{{nuevo.descripcion}}" />
                        </td>
                        <td colspan="2">
                            <label for="calle">Calle:</label>
                            <input id="calle" name="calle" type="text" class="form-control" ng-model="nuevo.calle" placeholder="Calle" value="{{nuevo.calle}}" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="montorenta">Renta:</label>
                            <input id="montorenta" name="montorenta" type="text" class="form-control" ng-model="nuevo.montorenta" placeholder="0.00" value="{{nuevo.montorenta}}" />
                        </td>
                        <td>
                            <label for="deposito">Deposito:</label>
                            <input id="deposito" name="deposito" type="text" class="form-control" ng-model="nuevo.deposito" placeholder="0.00" value="{{nuevo.deposito}}" />
                        </td>
                        <td colspan="2">
                            <label for="idtiporenta">Tipo de Pago:</label>
                            <select id="idtiporenta" name="idtiporenta" ng-model="nuevo.idtiporenta" class="form-control selectpicker">
                                <option ng-repeat="tipo in listaTiposRentas" value="{{tipo.idtiporenta}}">{{tipo.descripcion}}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="numext">Num Ext:</label>
                            <input id="numext" name="numext" type="text" class="form-control" ng-model="nuevo.numext" placeholder="Num Ext" value="{{nuevo.numext}}" />
                        </td>
                        <td>
                            <label for="numint">Num Int:</label>
                            <input id="numint" name="numint" type="text" class="form-control" ng-model="nuevo.numint" placeholder="Num Int" value="{{nuevo.numint}}" />
                        </td>
                        <td>
                            <label for="calle">Colonia:</label>
                            <input id="colonia" name="colonia" type="text" class="form-control" ng-model="nuevo.colonia" placeholder="Colonia" value="{{nuevo.colonia}}" />
                        </td>
                        <td>
                            <label for="codpost">Cod. Post.:</label>
                            <input id="codpost" name="codpost" type="text" class="form-control" ng-model="nuevo.codpost" placeholder="CP" value="{{nuevo.codpost}}" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="delmun">Delegacion / Municipio:</label>
                            <input id="delmun" name="delmun" type="text" class="form-control" ng-model="nuevo.delmun" placeholder="Delegacion / Municipio" value="{{nuevo.delmun}}" />
                        </td>
                        <td colspan="2">
                            <label for="calle">Estado:</label>
                            <input id="estado" name="estado" type="text" class="form-control" ng-model="nuevo.estado" placeholder="Estado" value="{{nuevo.estado}}" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary" ng-click="nuevoInmueble()">Guardar</button>
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
    <div id='editaInmueble' class="panel panel-default">
        <div class="panel-heading">
            <a href="#" data-toggle="collapse" data-target="#cuerpoDiv"><h4>Edita Inmueble</h4></a>
        </div>
        <div class="panel-body">
            <table class="table">
                <form>
                    <tr>
                        <td colspan="2">
                            <label for="descripcion">Descripcion:</label>
                            <input id="descripcion" name="descripcion" type="text" class="form-control" ng-model="edita.descripcion" placeholder="Descripcion" value="{{edita.descripcion}}" />
                        </td>
                        <td colspan="2">
                            <label for="calle">Calle:</label>
                            <input id="calle" name="calle" type="text" class="form-control" ng-model="edita.calle" placeholder="Calle" value="{{edita.calle}}" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="montorenta">Renta:</label>
                            <input id="montorenta" name="montorenta" type="text" class="form-control" ng-model="edita.montorenta" placeholder="0.00" value="{{edita.montorenta}}" />
                        </td>
                        <td>
                            <label for="deposito">Deposito:</label>
                            <input id="deposito" name="deposito" type="text" class="form-control" ng-model="edita.deposito" placeholder="0.00" value="{{edita.deposito}}" />
                        </td>
                        <td>
                            <label for="idtiporenta">Tipo de Pago:</label>
                            <select id="idtiporenta" name="idtiporenta" ng-model="edita.idtiporenta" class="form-control selectpicker">
                                <option ng-repeat="tipo in listaTiposRentas" value="{{tipo.idtiporenta}}">{{tipo.descripcion}}</option>
                            </select>
                        </td>
                        <td>
                            <label for="idtiporenta">Estatus:</label>
                            <select id="idestatus" name="idestatus" ng-model="edita.idestatus" class="form-control selectpicker">
                                <option ng-repeat="estatus in listaEstatusInmuebles" value="{{estatus.idstatus}}">{{estatus.descripcion}}</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="numext">Num Ext:</label>
                            <input id="numext" name="numext" type="text" class="form-control" ng-model="edita.numext" placeholder="Num Ext" value="{{edita.numext}}" />
                        </td>
                        <td>
                            <label for="numint">Num Int:</label>
                            <input id="numint" name="numint" type="text" class="form-control" ng-model="edita.numint" placeholder="Num Int" value="{{edita.numint}}" />
                        </td>
                        <td>
                            <label for="calle">Colonia:</label>
                            <input id="colonia" name="colonia" type="text" class="form-control" ng-model="edita.colonia" placeholder="Colonia" value="{{edita.colonia}}" />
                        </td>
                        <td>
                            <label for="codpost">Cod. Post.:</label>
                            <input id="codpost" name="codpost" type="text" class="form-control" ng-model="edita.codpost" placeholder="CP" value="{{edita.codpost}}" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label for="delmun">Delegacion / Municipio:</label>
                            <input id="delmun" name="delmun" type="text" class="form-control" ng-model="edita.delmun" placeholder="Delegacion / Municipio" value="{{edita.delmun}}" />
                        </td>
                        <td colspan="2">
                            <label for="calle">Estado:</label>
                            <input id="estado" name="estado" type="text" class="form-control" ng-model="edita.estado" placeholder="Estado" value="{{edita.estado}}" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-primary" ng-click="actualizaInformacion()" >Actualizar</button>
                        </td>
                        <td>
                            <button class="btn btn-primary" ng-click="regresarTop()" >Ir Arriba</button>
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
    
</div>
