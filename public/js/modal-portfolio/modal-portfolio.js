app.component('modalPortfolio', {
    templateUrl: './js/modal-portfolio/modal-portfolio.html',
    bindings: {
        resolve: '<',
        close: '&',
        dismiss: '&'
    },
    controller: function() {

        var $ctrl = this;

        $ctrl.$onInit = function() {

            $ctrl.srcImg = $ctrl.resolve.srcImg;
        };


        $ctrl.ok = function() {
            $ctrl.close({ $value: $ctrl.selected.item });
        };

        $ctrl.cancel = function() {
            $ctrl.dismiss({ $value: 'cancel' });
        };
    }
});