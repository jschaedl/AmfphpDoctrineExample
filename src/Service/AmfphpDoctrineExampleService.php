<?php

use Doctrine\ORM\EntityManager;
use Service\Vo\User\UserDTO;

class AmfphpDoctrineExampleService 
{	    
    public $dic;
    
    public function __construct() {
        $this->dic = new DIContainer();
    }
    
    public function createUser(UserDTO $user) {
        $this->dic['entityManager']->persist($user);
        $this->dic['entityManager']->flush();
    }
}
