<?php

class DataMunging {

	private $reader;
	private $lines;
	private $temperatures = array();

	public function __construct($reader) {
		$this->reader = $reader;
	}

	public function readLines($filepath) {
		$this->lines = $this->reader->getLines($filepath);
	}

	public function parseTemperatures() {
		foreach ($this->lines as $line) {
			$line = preg_replace('/\s+/', ' ', $line);
			$parsed_line = explode(" ", $line);
			if (count($parsed_line) >= 4) {
				$new_day = array('day' => intval($parsed_line[1]),
					'max_temp' => intval($parsed_line[2]),
					'min_temp' => intval($parsed_line[3]));
				
				if ($this->valid_day($new_day['day'])){
					array_push($this->temperatures, $new_day);					
				}
			}
		}
	}

	private function valid_day($day_int) {
		return $day_int <= 31 && $day_int >= 1;
	}

	public function printMaxTemp() {
		$max_temp = ~PHP_INT_MAX;
		$day = '';
		foreach ($this->temperatures as $temp) {
			if ($temp['max_temp'] > $max_temp) {
				$max_temp = $temp['max_temp'];
				$day = $temp['day'];
			}
		}
		return "Max temp on " . $day . " with " . $max_temp . "ºF";
	}

	public function printMinTemp() {
		$min_temp = PHP_INT_MAX;
		$day = '';
		foreach ($this->temperatures as $temp) {
			if ($temp['min_temp'] < $min_temp) {
				$min_temp = $temp['min_temp'];
				$day = $temp['day'];
			}
		}
		return "Min temp on " . $day . " with " . $min_temp . "ºF";
	}

	/*
	 * Setters & Getters
	 */

	public function getLines() {
		return $this->lines;
	}

	public function getTemperatures() {
		return $this->temperatures;
	}
}
