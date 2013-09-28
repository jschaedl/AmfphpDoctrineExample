<?php

require_once realpath(dirname(__FILE__)) . '/vendor/autoload.php';

$config = new Amfphp_Core_Config();
$config->serviceFolderPaths = array(dirname(__FILE__) . '/services/');
$config->pluginsConfig['AmfphpCustomClassConverter'] = array('customClassFolderPaths' => array(dirname(__FILE__) . '/services/vo'));

$gateway = Amfphp_Core_HttpRequestGatewayFactory::createGateway($config);
$gateway->service();
$gateway->output();
