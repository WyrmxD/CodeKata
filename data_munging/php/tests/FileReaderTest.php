<?php

class FileReaderTest extends PHPUnit_Framework_TestCase {

	protected $fr;

	protected function setUp() {
		$this->fr = new FileReader();
	}

	public function test_informs_if_file_not_exists() {
		$this->setExpectedException('Exception');
		$this->assertEquals(null, $this->fr->getLines("wrong_file.dat"));	
	}

	public function test_init_with_valid_file() {
		$this->fr->getLines("src/weather.dat");
		$this->assertEquals("src/weather.dat", $this->fr->filepath);	
	}

	public function test_returns_array_of_lines() {
		$lines = $this->fr->getLines("src/weather.dat");
		$this->assertEquals(true, is_array($lines) );
	}

	public function test_returns_filled_array_of_lines() {
		$lines = $this->fr->getLines("src/weather.dat");
		$this->assertGreaterThan(0, count($lines));
	}

}