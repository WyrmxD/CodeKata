<?php
class Search {
	
	public function chop($needle, $number_list) {

		if(count($number_list) == 0) {
			return -1;
		}

		if (count($number_list) == 1 && $number_list[0] == $needle) {
			return 0;
		}

		if (count($number_list) > 1) {
			if ($needle == $number_list[0]) {
				return 0;				
			} elseif ($needle == $number_list[1]) {
				return 1;
			}
		}
		return -1;
	}

}