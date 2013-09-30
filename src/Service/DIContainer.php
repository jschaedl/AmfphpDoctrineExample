<?php


use \Doctrine\ORM\Tools\Setup;
use \Doctrine\ORM\EntityManager;

class DIContainer extends Pimple
{
	public function __construct() {
		$this['isDevMode'] = false;
		$this['domainObjectsPath'] =  array('src/Service/Vo');
		$this['databaseConfig'] = array(
			'driver' => 'pdo_mysql', 'user' => 'foo', 
			'password' => 'foo', 'dbname' => 'foo');
		
		$this['entityManagerConfig'] = function ($c) {
			return Setup::createAnnotationMetadataConfiguration(
					$c['domainObjectsPath'], 
					$c['isDevMode']);
		};
		$this['entityManager'] = $this->share(function ($c) {
			return EntityManager::create(
					$c['databaseConfig'], 
					$c['entityManagerConfig']);
		});
	}
}