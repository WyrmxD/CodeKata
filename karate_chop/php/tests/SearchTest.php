<?php

class SearchTest extends PHPUnit_Framework_TestCase {

	public function testChop_an_empty_array() {
		$number_list = array();
		$this->assertEquals(-1, Search::chop(1, $number_list));
	}

	public function testChop_list_with_one_element_success() {
		$number_list = array(1);
		$this->assertEquals(0, Search::chop(1, $number_list));
	}

	public function testChop_list_with_one_element_fails() {
		$number_list = array(1);
		$this->assertEquals(-1, Search::chop(2, $number_list));
	}

	public function testChop_list_with_two_elements_success() {
		$number_list = array(1,2);
		$this->assertEquals(1, Search::chop(2, $number_list));	
	}

	public function testChop_list_with_two_elements_fails() {
		$number_list = array(1,2);
		$this->assertEquals(-1, Search::chop(3, $number_list));	
	}

	public function testChop_list_with_several_elemets() {
		$number_list = array(1,2,3,4,6);
		$this->assertEquals(3, Search::chop(4, $number_list));
	}

	public function testChop_list_with_several_elemets_fails() {
		$number_list = array(1,2,3,4,6);
		$this->assertEquals(-1, Search::chop(5, $number_list));		
	}
}