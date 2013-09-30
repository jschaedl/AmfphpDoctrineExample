<?php

namespace Service;

use Doctrine\ORM\EntityManager;

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
