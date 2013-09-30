<?php

namespace tests;

use Service\Vo\User\UserDTO;
use Service\Vo\Account\LecturerAccountDTO;
use Service\Vo\Account\GuestAccountDTO;
use Service\Vo\Account\TutorAccountDTO;

class AmfphpDoctrineExampleServiceTest extends \PHPUnit_Framework_TestCase
{
	protected $exampleService;
	
	protected function setUp() {
		$this->exampleService = new \AmfphpDoctrineExampleService();
	}
	
	protected function tearDown() {
		$this->exampleService = null;
	}
	
	public function test_createUser() {
		$user = new UserDTO();
		$user->username = 'jschaedl';
		$user->generatePassword('123456');
		$user->generateActivationKey();
		$account = new LecturerAccountDTO();
		$account->livetimeStart = new \DateTime();
		$account->livetimeEnd = new \DateTime();
		$user->accounts->add($account);
		$this->exampleService->dic['entityManager']->persist($account);
		
		$account = new TutorAccountDTO();
		$account->livetimeStart = new \DateTime();
		$account->livetimeEnd = new \DateTime();
		$user->accounts->add($account);
		$this->exampleService->dic['entityManager']->persist($account);
		
		$account = new GuestAccountDTO();
		$account->livetimeStart = new \DateTime();
		$account->livetimeEnd = new \DateTime();
		$user->accounts->add($account);
		$this->exampleService->dic['entityManager']->persist($account);
		
		$this->exampleService->dic['entityManager']->persist($user);
		$this->exampleService->dic['entityManager']->flush();
		
	}
	/*
	public function test_readUser() {
	
	}
	
	public function test_updateUser() {
	
	}
	
	public function test_deleteUser() {
	
	}
	*/
}