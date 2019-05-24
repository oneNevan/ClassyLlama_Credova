import Component from 'uiComponent';
import rendererList from 'Magento_Checkout/js/model/payment/renderer-list';

rendererList.push(
    {
        type: 'credova',
        component: 'es6!ClassyLlama_Credova/js/view/payment/method-renderer/credova'
    }
);

export default Component.extend({});
