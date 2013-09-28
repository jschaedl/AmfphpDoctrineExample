<?php

class ExampleService 
{	
	private $dic;
	
	function __constructor() {
		$dic = new DIContainer();
	}
	
    public function test() {
        return 'test';
    }
    
    public function testParam($param) {
        return $param;
    }
}
