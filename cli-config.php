<?php
require_once 'vendor/autoload.php';

use \Doctrine\ORM\Tools\Console\ConsoleRunner;

$dic = new DIContainer();
$entityManager = $dic['entityManager'];

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);