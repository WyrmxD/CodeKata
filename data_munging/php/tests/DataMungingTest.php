<?php

class DataMungingTest extends PHPUnit_Framework_TestCase {

	protected function setUp() {
		$this->reader = new FileReader();
		$this->dm = new DataMunging($this->reader);		
		$this->dm->readLines("src/weather.dat");
	}

	public function test_gets_lines_from_source() {
		$this->assertGreaterThan(0, count($this->dm->getLines()));
	}

	public function test_stores_day_with_temperatures() {
		$this->dm->parseTemperatures();
		$this->assertNotEmpty($this->dm->getTemperatures());
	}

	public function test_prints_max_temp() {
		$this->dm->parseTemperatures();
		$this->assertEquals("Max temp on 26 with 97ºF", $this->dm->printMaxTemp() );
	}

	public function test_prints_min_temp() {
		$this->dm->parseTemperatures();
		$this->assertEquals("Min temp on 9 with 32ºF", $this->dm->printMinTemp() );
	}
}