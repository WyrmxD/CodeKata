<?php
class Search {
	
	public function chop($needle, $number_list) {
		if (count($number_list) > 0 && $needle == $number_list[0]) {
			return 0;
		}
		return -1;
	}
}