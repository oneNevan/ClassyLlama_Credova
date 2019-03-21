define([
    'jquery'
], function ($) {
    'use strict';

    $.widget('classyllama.credovaQualificationPopup', {

        _create: function () {
            var that = this;

            that.element.click(function(e) {
                that.triggerPopup();
            });
        },

        triggerPopup: function() {
            var that = this;

            var form = that.element.closest('#product_addtocart_form');

            var url = form.prop('action').replace('checkout/cart/add', 'credova/cart/transientAdd');

            $.post(url, form.serialize()).done(function(data) {
                if (data.newTotal <= 0) {
                    console.error('Unable to get qualification product total');
                } else if (data.newTotal >= that.options.minimumAmount) {
                    that.showQualificationPopup(data.newTotal);
                } else {
                    that.handleInsufficientAmount();
                }
            });
        },

        showQualificationPopup: function(amount) {
            var that = this;

            // NB: due to the way this widget is initialized, CRDV must necessarily have been made available.
            CRDV.plugin.prequalify(amount).then(function(res) {
                if (res.approved) {
                    that.handleApproval(res.profileId);
                } else {
                    that.handleDecline();
                }
            });
        },

        handleInsufficientAmount: function() {
            // @todo: user messaging
        },

        handleApproval: function(profileId) {
            // @todo: add to cart and store profile ID
        },

        handleDecline: function() {
            // @todo: user messaging
        }
    });

    return $.classyllama.credovaQualificationPopup;
});
