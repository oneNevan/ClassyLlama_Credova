# ClassyLlama Credova Extension

## Description

This extension adds a payment method utilizing Credova's financing services.

## Installation Instructions

### Option 1 - Install extension by copying files into project

```bash
mkdir -p app/code/ClassyLlama/Credova
git archive --format=tar --remote=git@bitbucket.org:classyllama/classyllama_credova.git master | tar xf - -C app/code/ClassyLlama/Credova/
bin/magento module:enable --clear-static-content ClassyLlama_Credova
bin/magento setup:upgrade
bin/magento cache:flush
```

### Option 2 - Install extension using Composer if you are doing active development on the extension

```bash
composer config repositories.classyllama/module-credova git git@bitbucket.org:classyllama/classyllama_credova.git
composer require classyllama/module-credova:dev-develop
bin/magento module:enable --clear-static-content ClassyLlama_Credova
bin/magento setup:upgrade
bin/magento cache:flush
```

## Uninstallation Instructions

These instructions work regardless of how you installed the extension:

```bash
bin/magento module:disable --clear-static-content ClassyLlama_Credova
rm -rf app/code/ClassyLlama/Credova
composer remove classyllama/module-credova
mr2 db:query 'DELETE FROM `setup_module` WHERE `module` = "ClassyLlama_Credova"'
bin/magento cache:flush
```