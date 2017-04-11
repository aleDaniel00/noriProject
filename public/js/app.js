var app = angular.module('myApp', ['ngAnimate', 'ngSanitize', 'ui.bootstrap', 'perfect_scrollbar', 'panhandler']);

app.controller('myCtrl', function($scope, $uibModal, $log) {
    var $ctrl = this;
    $scope.menu = false;
    $scope.items = [{
            titulo: 'Branding',
            contenido: 'The integrity and crossorigin attributes are used for Subresource Integrity (SRI) checking. This allows browsers to ensure that resources hosted on third-party',
            srcImgMini: '../images/j1.jpg',
            srcImgBig: '../images/j1big.png'
        },
        {
            titulo: 'Branding',
            contenido: 'The integrity and crossorigin attributes are used for Subresource Integrity (SRI) checking. This allows browsers to ensure that resources hosted on third-party',
            srcImgMini: '../images/j1.jpg',
            srcImgBig: '../images/j1big.png'
        },
        {
            titulo: 'Branding',
            contenido: 'The integrity and crossorigin attributes are used for Subresource Integrity (SRI) checking. This allows browsers to ensure that resources hosted on third-party',
            srcImgMini: '../images/j1.jpg',
            srcImgBig: '../images/j1big.png'
        }
    ];


    $scope.toggle = function(params) {
        if ($scope.menu == false) {
            $scope.menu = true;
        } else {
            $scope.menu = false;
        }
    }
    $scope.openComponentModal = function(imagen) {
        var src = imagen
        var modalInstance = $uibModal.open({
            animation: true,
            component: 'modalPortfolio',
            windowClass: 'itemPortfolio',
            size: 'cienPorCiento',
            resolve: {
                srcImg: function() {
                    return src;
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