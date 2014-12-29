<?php

class CalculatorTest extends PHPUnit_Framework_TestCase {

	public function testAdd_empty_string(){
		$this->assertEquals(0, Calculator::add(''));
	}

	public function testAdd_one_number(){
		$this->assertEquals(1, Calculator::add('1'));	
	}

	public function testAdd_two_numbers(){
		$this->assertEquals(3, Calculator::add('1,2'));
	}

	public function testAdd_several_numbers(){
		$this->assertEquals(6, Calculator::add('1,2,3'));
	}

	public function testAdd_several_numbers_and_blanks(){
		$this->assertEquals(6, Calculator::add('1,2,,3'));
	}

	public function testAdd_with_new_lines_and_commas(){
		$this->assertEquals(6, Calculator::add("1\n2,3"));
	}

	public function testAdd_supports_different_separators(){
		$this->assertEquals(3, Calculator::add("//;\n1;2"));
	}

	public function testAdd_negative_raise_error(){
		$this->setExpectedException('InvalidArgumentException');
		$this->assertEquals(3, Calculator::add("//;\n-1;2"));
	}
}