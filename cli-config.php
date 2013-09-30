<?php
require_once 'vendor/autoload.php';

use \Doctrine\ORM\Tools\Console\ConsoleRunner;
use Service\DIContainer;

$dic = new DIContainer();
$entityManager = $dic['entityManager'];

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);