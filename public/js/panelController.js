(function() {
    'use strict';

    angular
        .module('myApp')
        .controller('panelController', panelController);

    panelController.inject = ['$scope', '$http', '$location'];

    function panelController($scope, $http, $location) {
        var vm = this;
        $http.get("../data.json").then(function(response) {
            console.log(response.data.data.secciones[0]);
            $scope.data = response.data.data;
            debugger
            $scope.srcLogo = response.data.data.logo;
            $scope.lenguajes = response.data.data.lenguajes;
            $scope.encabezados = response.data.data.encabezados_secciones;
            $scope.habilidades = response.data.data.secciones[0].diseño.habilidades;
            $scope.boton_mas = response.data.data.secciones[0].diseño.boton_mas;
            $scope.anclas = response.data.data.anclas;
            $scope.intro = response.data.data.intro[0];
            $scope.about = response.data.data.secciones[0].about;
        });
        if ($location.$$absUrl == 'http://localhost:4300/productos') {
            $scope.login = true;
        }

        activate();

        ////////////////

        function activate() {


        }
    }
})();