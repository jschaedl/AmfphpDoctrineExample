<?php

require_once realpath(dirname(__FILE__)) . '/vendor/autoload.php';

$paths = array('services/vo');
$isDevMode = false;
$entityManagerConfig = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$databaseConfig = array('driver' => 'pdo_mysql', 'user' => 'foo', 'password' => 'foo', 'dbname' => 'foo');
$entityManager = Doctrine\ORM\EntityManager::create($databaseConfig, $entityManagerConfig);

$config = new Amfphp_Core_Config();
$config->serviceFolderPaths = array(dirname(__FILE__) . '/services/');
$config->pluginsConfig['AmfphpCustomClassConverter'] = array('customClassFolderPaths' => array(dirname(__FILE__) . '/services/vo'));

$gateway = Amfphp_Core_HttpRequestGatewayFactory::createGateway($config);
$gateway->service();
$gateway->output();
