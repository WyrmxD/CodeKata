<?php

class SearchTest extends PHPUnit_Framework_TestCase {

	public function testChop_empty_array(){
		$number_list = array();
		$this->assertEquals(-1, Search::chop(1, $number_list));
	}
}