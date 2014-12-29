<?php

class Calculator {

	private static $default_separators = array(",", "\s");
	
	static function add($string) {

		$numbers = self::splitter($string);

		if (!self::positive($numbers)) {
			throw new InvalidArgumentException("Negative numbers not allowed", 1);
		}
		
		return self::calc_total($numbers);
	}


	private function splitter($string) {

		$separators = '[' . implode("|", self::$default_separators) . ']';
		if (strstr($string, "//")){
			$separators = substr($string, 2, 1);
		}
		return preg_split("/" . $separators . "/", $string);
	}

	private function positive($numbers) {
		foreach ($numbers as $number) {
			if ($number < 0) {
				return false;
			}
		}
		return true;
	}
	
	private function calc_total($numbers) {
		$total = 0;
		foreach ($numbers as $number) {
			$total += $number;
		}
		return $total;
	}

}