/* 
 * Archivo angular para el proyecto de rentas
 */
var rentas;

(function(){
   rentas = angular.module('rentas', []);
   
   var idusr = 0;
   var usuario = "";
   var nombre = "";
   var apellidos = "";
   var idperfil = 0;
   var idestatus = 0;
   var idpropietario = 0;
   var idprop = 0;
   var tiposRentas = "-";
   var estatusInmuebles = "-";
   
   /**
    * Controller para setear la info del usuario
    * @param {$scope}
    */
    rentas.controller('setInfoUsuarioController', function($scope){
        $scope.setInfoUsuario = function(paIdUsuario, paUlogin){
            idusr = paIdUsuario;
            usuario = paUlogin;
        };
    });
    
    rentas.factory('ListaTiposRenta', function($q, $http){
        var get = function(search){
            var deferred = $q.defer();
            $http.get("actions/catalogos.php?idcatalogo=1").
                    success(function(data, status, headers, config){
                        deferred.resolve(eval('('+JSON.stringify(data)+')'));
            }).error(function(data, status, headers, config){
                deferred.reject(status);
            });
            return deferred.promise;
        };
        return {get: get};
    });
    
    rentas.factory('ListaEstatusInmuebles', function($q, $http){
        var get = function(search){
            var deferred = $q.defer();
            $http.get("actions/catalogos.php?idcatalogo=2").
                    success(function(data, status, headers, config){
                        deferred.resolve(eval('('+JSON.stringify(data)+')'));
            }).error(function(data, status, headers, config){
                deferred.reject(status);
            });
            return deferred.promise;
        };
        return {get: get};
    });
    
    /**
     * Controller para el inicio de sesion
     */
    rentas.controller('inicioSesionController', function($scope, $http){
        $scope.consulta={
            txtUsuario : ""
            ,txtPass : ""
        };
        
        $scope.inicioSesion = function(){
            $http({
                method:'GET'
                ,url:'actions/iniciarSesion.php?session='+btoa($scope.consulta.txtUsuario+'|'+$scope.consulta.txtPass)
            }).success(function(data, status, headers, config){
                try{
                    var salida = JSON.stringify(data);
                    var resp = "";
                    try{
                        resp = eval('('+salida+')');
                    }catch(ex){
                        alert("Excepcion del eval: " + ex);
                    }
                    if((resp.res === 1)||(resp.res === "1")){
                        $scope.idusr = resp.datos[0].idusr;
                        $scope.usuario = resp.datos[0].usuario;
                        $scope.nombre = resp.datos[0].nombre;
                        $scope.apellidos = resp.datos[0].apellidos;
                        $scope.idperfil = resp.datos[0].idperfil;
                        $scope.idestatus = resp.datos[0].idestatus;
                        $scope.idprop = resp.datos[0].idpropietario;
                        var params = btoa($scope.idusr+"|"+$scope.usuario+"|"+$scope.nombre+"|"+$scope.apellidos+"|"+$scope.idperfil+"|"+$scope.idestatus+"|"+$scope.idprop);
                        window.location = "menuPrincipal.php?session="+params;
                    }
                }catch(ex){
                    alert("Excepcion en el success: " + ex);
                }
            }).error(function(data, status, headers, config){
                try{
                    console.log("en el error");
                }catch(ex){
                    alert("Excepcion en el error: " + ex);
                }
            });
        };
    });
    
    /**
     * Controller para el ABC de inmuebles
     */
    rentas.controller('inmueblesController', function($scope, $http, $location, $anchorScroll, ListaTiposRenta, ListaEstatusInmuebles){
        $scope.nuevo = {
            descripcion : ''
            ,calle : ''
            ,numext : ''
            ,numint : ''
            ,codpost : ''
            ,colonia : ''
            ,delmun : ''
            ,estado : ''
            ,idestatus : 1
            ,idcliente : 0
            ,montorenta : 0
            ,idtiporenta : 0
            ,idusrreg : $scope.idusr
            ,idpropietario : $scope.idprop
            ,deposito : 0
        };
        
        $scope.edita = {};
        
        $scope.consulta = {
            filtro: ''
            ,idpropietario : $scope.idprop
        };
        
        $scope.listaTiposRentas = [];
        
        $scope.listaEstatusInmuebles = [];
        
        $scope.listaInmuebles = [];
        
        $scope.$watch('search', function(newValue, oldValue){
            var promesa;
            var promesaListaEstatusInmuebles;
            if(tiposRentas !== "-"){
                $scope.listaTiposRentas = tiposRentas;
            }else{
                promesa = ListaTiposRenta.get(newValue);
                promesa.then(function(value){
                    $scope.listaTiposRentas = value.datos;
                    tiposRentas = value.datos;
                }, function(reason){
                    $scope.error = reason;
                });
            }
            if(estatusInmuebles !== "-"){
                $scope.listaEstatusInmuebles = estatusInmuebles;
            }else{
                promesaListaEstatusInmuebles = ListaEstatusInmuebles.get(newValue);
                promesaListaEstatusInmuebles.then(function(value){
                    console.log(JSON.stringify(value));
                    $scope.listaEstatusInmuebles = value.datos;
                    estatusInmuebles = value.datos;
                },function(reason){
                    $scope.error = reason;
                });
            }
        });
        
        /**
         * Busca los inmuebles
         * @returns {undefined}
         */
        $scope.buscaInmuebles = function(){
            $http({
                method :'GET'
                ,url : 'actions/buscaInmueble.php?param='+btoa($scope.consulta.filtro+'|'+$scope.consulta.idpropietario)
            }).success(function(data, status, headers, config){
                var salida = JSON.stringify(data);
                var resp = "";
                try{
                    resp = eval('('+salida+')');
                    $scope.listaInmuebles = resp.datos;
                }catch(ex){
                    alert("Excepcion del eval: " + ex);
                }
            }).error(function(data, status, headers, config){
                try{
                    console.log("en el error");
                }catch(ex){
                    alert("Excepcion en el error: " + ex);
                }
            });
        };
        
        /**
         * Manda la informacion del inmueble seleccionado
         * a los campos para editarlos
         * @param {type} datos
         * @returns {undefined}
         */
        $scope.editaInformacion = function(datos){
            $scope.edita = datos;
            $location.hash('editaInmueble');
            $anchorScroll();
        };
        
        /**
         * Guarda los cambios en la base de datos
         * @returns {undefined}
         */
        $scope.actualizaInformacion = function(){
            $http({
                method :'GET'
                ,url :'actions/actualizaInmueble.php?param='+btoa(
                        $scope.edita.idinmueble+'|'+
                        $scope.edita.descripcion+'|'+
                        $scope.edita.calle+'|'+
                        $scope.edita.montorenta+'|'+
                        $scope.edita.deposito+'|'+
                        $scope.edita.idtiporenta+'|'+
                        $scope.edita.numext+'|'+
                        $scope.edita.numint+'|'+
                        $scope.edita.colonia+'|'+
                        $scope.edita.codpost+'|'+
                        $scope.edita.delmun+'|'+
                        $scope.edita.estado+'|'+
                        $scope.edita.idpropietario+'|'+
                        $scope.edita.idestatus+'|'+
                        $scope.edita.idusrreg
                    )
            }).success(function(data, status, headers, config){
                try{
                    var salida = JSON.stringify(data);
                    var resp = "";
                    try{
                        resp = eval('('+salida+')');
                        alert(resp.msg);
                        $scope.buscaInmuebles();
                        $scope.regresarTop();
                    }catch(ex){
                        alert("Excepcion del eval: " + ex);
                    }
                }catch(ex){
                    alert("Excepcion en el success: " + ex);
                }
            }).error(function(data, status, headers, config){
                try{
                    console.log("en el error");
                }catch(ex){
                    alert("Excepcion en el error: " + ex);
                }
            });
        };
        
        /**
         * Regresa a la parte alta de la pagina
         * @returns {undefined}
         */
        $scope.regresarTop = function(){
            $location.hash('listaInmueble');
            $anchorScroll();
        };

        /**
         * Registra un nuevo inmueble
         * @returns {undefined}
         */
        $scope.nuevoInmueble = function(){
            $http({
                method :'GET'
                ,url :'actions/registraInmueble.php?param='+btoa(
                        $scope.nuevo.descripcion+'|'+
                        $scope.nuevo.calle+'|'+
                        $scope.nuevo.montorenta+'|'+
                        $scope.nuevo.deposito+'|'+
                        $scope.nuevo.idtiporenta+'|'+
                        $scope.nuevo.numext+'|'+
                        $scope.nuevo.numint+'|'+
                        $scope.nuevo.colonia+'|'+
                        $scope.nuevo.codpost+'|'+
                        $scope.nuevo.delmun+'|'+
                        $scope.nuevo.estado+'|'+
                        $scope.nuevo.idpropietario+'|'+
                        $scope.nuevo.idusrreg
                    )
            }).success(function(data, status, headers, config){
                try{
                    var salida = JSON.stringify(data);
                    var resp = "";
                    try{
                        resp = eval('('+salida+')');
                        alert(resp.msg);
                        $scope.buscaInmuebles();
                    }catch(ex){
                        alert("Excepcion del eval: " + ex);
                    }
                }catch(ex){
                    alert("Excepcion en el success: " + ex);
                }
            }).error(function(data, status, headers, config){
                try{
                    console.log("en el error");
                }catch(ex){
                    alert("Excepcion en el error: " + ex);
                }
            });
        };
        
    });
})();


