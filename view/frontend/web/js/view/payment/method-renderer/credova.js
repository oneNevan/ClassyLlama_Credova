import Component from 'Magento_Checkout/js/view/payment/default';
import quote from 'Magento_Checkout/js/model/quote';
import storage from 'mage/storage';
import urlBuilder from 'Magento_Checkout/js/model/url-builder';
import checkoutData from 'Magento_Checkout/js/checkout-data';
import 'credovaPlugin'


function checkPropertyValues(data, properties) {
    return properties.every(function (property) {
        return data.hasOwnProperty(property) && typeof data[property] === 'string' && data[property].length > 0;
    });
}

export default Component.extend({
    defaults: {
        template: 'ClassyLlama_Credova/payment/credova',
        preQualificationId: null
    },

    initialize: function initialize() {
        this._super();

        this.publicId = null;
        this.applicationRequestProcessing = false;
        this.observe(['publicId', 'applicationRequestProcessing']);

        window.CRDV.plugin.config({
            environment: window.CRDV.Environment.Sandbox,
            store: "CLL000"
        });

        window.CRDV.plugin.addEventListener(this.onCredovaEvent.bind(this));
    },

    onCredovaEvent: function onCredovaEvent(event) {
        if (event.eventName !== window.CRDV.EVENT_USER_WAS_APPROVED) {
            return;
        }

        this.preQualificationId = event.eventArgs.publicId;

        window.alert("User was approved and publicId is " + this.preQualificationId);
    },

    initializeCredovaButton: function initializeCredovaButton(element) {
        element.dataset.amount = quote.totals()['grand_total'];

        window.CRDV.plugin.injectButton(element);
    },

    /** Returns is method available */
    isAvailable: function () {
        return quote.totals()['grand_total'] >= 300;
    },

    getData: function () {
        return {
            'method': this.item.method,
            'po_number': null,
            'additional_data': {
                'application_id': this.publicId()
            }
        };
    },

    authorizeCredovaFinancing: function authorizeCredovaFinancing() {
        const billingAddress = quote.billingAddress();

        if (!checkPropertyValues({...billingAddress, guestEmail: quote.guestEmail}, ['firstname', 'lastname', 'telephone', 'guestEmail'])) {
            // TODO: Notifiy user they need valid billing address info
            return;
        }

        this.applicationRequestProcessing(true);

        storage.post(
            urlBuilder.createUrl('/credova/createApplication', {}),
            JSON.stringify({
                "applicationInfo": {
                    "first_name": billingAddress.firstname,
                    "last_name": billingAddress.lastname,
                    "phone_number": billingAddress.telephone,
                    "email": billingAddress.guestEmail
                }
            }),
            false
        ).done(publicId => {
            if (!publicId) {
                // TODO: Handle error
                return;
            }

            this.publicId(publicId);

            // TODO: Figure out capture
            window.CRDV.plugin.checkout(this.publicId()).then(approved => {
                this.applicationRequestProcessing(false);

                if (!approved) {
                    return;
                }

                this.placeOrder();
            });
        }).fail(() => this.applicationRequestProcessing(false));
    }
});
