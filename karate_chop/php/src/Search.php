<?php
class Search {
	
	public function chop($needle, $number_list) {

		$list_size = count($number_list);
		if ($list_size == 0) {
			return -1;
		}

		return self::binary_chop($needle, 0, $list_size-1, $number_list);
	}

	private function binary_chop($needle, $first, $last, $number_list) {

		if($first > $last) {
			return -1;
		}
		$middle = round($last - $first / 2, 0, PHP_ROUND_HALF_DOWN);

		if ($number_list[$middle] == $needle){
			return $middle;
		} else if ($number_list[$middle] < $needle) {
			return self::binary_chop($needle, $first, $middle -1 , $number_list);
		} else if ($number_list[$middle] > $needle) {
			return self::binary_chop($needle, $middle +1, $last , $number_list);
		} else {
			return -1;
		}
	}

}