<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
    static protected $zendAutoloader = false;

    public function setup() {
        $this->enablePlugins('sfDoctrinePlugin');
        $this->enablePlugins('ysJQueryRevolutionsPlugin');
        $this->enablePlugins('ysJQueryUIPlugin');
        $this->enablePlugins('sfDoctrineGuardPlugin');
        $this->enablePlugins('sfFormExtraPlugin');
    }

    static public function registerZend() {
        if (!self::$zendAutoloader) {
            set_include_path(sfConfig::get('sf_lib_dir') . '/vendor' . PATH_SEPARATOR . get_include_path());
            require_once sfConfig::get('sf_lib_dir') . '/vendor/Zend/Loader/Autoloader.php';
            self::$zendAutoloader = Zend_Loader_Autoloader::getInstance();
        }
        return self::$zendAutoloader;
    }
}
