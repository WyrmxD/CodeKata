<?php

class SearchTest extends PHPUnit_Framework_TestCase {

	public function testChop_an_empty_array() {
		$number_list = array();
		$this->assertEquals(-1, Search::chop(1, $number_list));
	}

	public function testChop_list_whit_one_element_success() {
		$number_list = array(1);
		$this->assertEquals(0, Search::chop(1, $number_list));
	}

	public function testChop_list_whit_one_element_fails() {
		$number_list = array(1);
		$this->assertEquals(-1, Search::chop(2, $number_list));
	}
}