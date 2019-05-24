/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    paths: {
        'credovaPlugin': ['//plugin.credova.com/plugin.min'],
        es6: 'ClassyLlama_Credova/js/es6',
        babel: 'ClassyLlama_Credova/js/babel.min',
        'babel-plugin-module-resolver': 'ClassyLlama_Credova/js/babel-plugin-module-resolver-standalone'
    },
    config: {
        es6: {
            resolveModuleSource: function (sourcePath) {
                return sourcePath;
            }
        }
    },
    shim: {
        'underscore': {
            exports: 'CRDV'
        }
    }
};
