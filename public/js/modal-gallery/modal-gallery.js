(function() {
    'use strict';

    // Usage:
    // 
    // Creates:
    // 

    angular
        .module('myApp')
        .component('modalGallery', {
            templateUrl: './js/modal-gallery/modal-gallery.html',
            //templateUrl: 'templateUrl',
            controller: modalGalleryController,
            controllerAs: '$ctrl',
            bindings: {
                resolve: '<',
                close: '&',
                dismiss: '&'
            },
        });

    // modalGalleryController.$inject = ['dependency1'];

    function modalGalleryController() {
        var $ctrl = this;


        ////////////////

        $ctrl.$onInit = function() {
            debugger
            console.log($ctrl);
            $ctrl.images = $ctrl.resolve.gallery;

        };
        $ctrl.$onChanges = function(changesObj) {};
        $ctrl.$onDestroy = function() {};
    }
})();