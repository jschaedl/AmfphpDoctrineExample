<?php

namespace tests\Vo;

use Service\Vo\User\UserDTO;

class UserDTOTest extends \PHPUnit_Framework_TestCase
{
	protected $userDTO;
	
	protected function setUp() {
		$this->userDTO = new UserDTO();
	}
	
	protected function tearDown() {
		$this->userDTO = null;
	}
	
	public function test_generatePassword() {
		$this->userDTO->generatePassword('123456');
		$this->assertEquals(md5('123456'), $this->userDTO->password);
	}
	
	public function test_generateActivationKey_withAllParametersPresent() {
		$this->userDTO->username = 'jschaedl';
		$this->userDTO->generatePassword('123456');
		$this->userDTO->generateActivationKey();
		$this->assertEquals(md5($this->userDTO->username . $this->userDTO->password), $this->userDTO->activationKey
		);
	}
	
	/** @expectedException InvalidArgumentException */
	public function test_generateActivationKey_withoutUsernamePresent() {
		$this->userDTO = new UserDTO();
		$this->userDTO->generatePassword('123456');
		$this->userDTO->generateActivationKey();
	}
	
	/** @expectedException InvalidArgumentException */
	public function test_generateActivationKey_withoutPasswordPresent() {
		$this->userDTO = new UserDTO();
		$this->userDTO->username = 'jschaedl';
		$this->userDTO->generateActivationKey();
	}
	
	public function test_validatePasswordIfPasswordIsTrue() {
		$this->userDTO = new UserDTO();
		$this->userDTO->generatePassword('123456');
		$this->assertTrue($this->userDTO->validatePassword('123456'));
	}
	
	public function test_validatePasswordIfPasswordIsFalse() {
		$this->userDTO = new UserDTO();
		$this->userDTO->generatePassword('123456');
		$this->assertFalse($this->userDTO->validatePassword('1234'));
	}
}