<?php

class ExampleService 
{
    public function test() {
        return 'hallo';
    }
    
    public function testParam($param) {
        return $param;
    }
}
