<?php

require_once 'vendor/autoload.php';

$paths = array('services/vo');
$isDevMode = false;
$entityManagerConfig = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

$databaseConfig = array('driver' => 'pdo_mysql', 'user' => 'foo', 'password' => 'foo', 'dbname' => 'foo');
$entityManager = Doctrine\ORM\EntityManager::create($databaseConfig, $entityManagerConfig);