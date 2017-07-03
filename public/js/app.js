var app = angular.module('myApp', ['ngAnimate', 'ngSanitize', 'ui.bootstrap', 'pascalprecht.translate', 'ui.materialize']);

app.controller('myCtrl', function($scope, $uibModal, $log, $translate, $location, $http) {
    var $ctrl = this;
    $scope.login = false;
    $http.get("./data.json").then(function(response) {

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
        $scope.photography = response.data.data.secciones[0].photography;
    });
    debugger
    if ($location.$$absUrl == 'http://localhost:4300/productos') {
        $scope.login = true;
    }
    $scope.menu = false;


    $scope.toggle = function(params) {
        if ($scope.menu == false) {
            $scope.menu = true;
        } else {
            $scope.menu = false;
        }
    }
    $scope.openComponentModal = function(item) {
        debugger
        $scope.src = item
        var modalInstance = $uibModal.open({
            animation: true,
            component: 'modalPortfolio',
            windowClass: 'itemPortfolio',
            size: 'cienPorCiento',
            resolve: {
                srcImg: function() {
                    return $scope.src;
                }
            }
        });

        modalInstance.result.then(function(selectedItem) {
            $ctrl.selected = selectedItem;
        }, function() {
            $log.info('modal-component dismissed at: ' + new Date());
        });
    };

    $scope.openGallery = function() {
        debugger

        var modalInstance = $uibModal.open({
            animation: true,
            component: 'modalGallery',
            windowClass: 'gallery',
            size: 'gallery_size',
            resolve: {
                gallery: function() {
                    return $scope.photography.gallery;
                }
            }
        });

        modalInstance.result.then(function(selectedItem) {
            $ctrl.selected = selectedItem;
        }, function() {
            $log.info('modal-component dismissed at: ' + new Date());
        });
    };

    $scope.firstName = "John";
    $scope.lastName = "Doe";


    $scope.changeLanguage = function(lang) {
        $translate.use(lang);
    }
});
app.directive('scrollOnClick', function() {
    return {
        restrict: 'A',
        link: function(scope, $elm) {
            $elm.on('click', function() {
                $("body").animate({ scrollTop: $elm.offset().top }, "slow");
            });
        }
    }
});
app.config(["$translateProvider", function($translateProvider) {

    var en_translations = {
        "language": "Selected Language English",
        "greeting": "hi"
    }

    var sp_translations = {
        "language": "Selected Language Spanish",
        "greeting": "hola"
    }

    $translateProvider.translations('en', en_translations);

    $translateProvider.translations('sp', sp_translations);

    $translateProvider.preferredLanguage('en');

}]);