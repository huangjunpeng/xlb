<?php
class Share_Bootstrap extends Zend_Application_Module_Bootstrap {

    protected function _initAutoload() {
        $auto_loader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath' => APPLICATION_PATH . '/modules/share'));
        return $auto_loader;
    }

}

