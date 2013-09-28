<?php

class AmfphpDoctrineExampleServiceTest extends PHPUnit_Framework_TestCase
{
	protected $amfphpDoctrineExampleService;
	
	protected function setUp() {
		$this->amfphpDoctrineExampleService = new AmfphpDoctrineExampleService();
	}
	
	protected function tearDown() {
		$this->exampleService = null;
	}
	
	function test_get() {
		$this->assertEquals('test', $this->amfphpDoctrineExampleService->get('test'));
	}
}