<?php
class Search {
	
	public function chop($needle, $number_list) {

		$list_size = count($number_list);
		if ($list_size == 0) {
			return -1;
		}

		//return self::binary_chop($needle, 0, $list_size-1, $number_list);
		return self::binary_chop_it($needle, $number_list);
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

	private function binary_chop_it($needle, $number_list) {

		$first = 0;
		$last = count($number_list) -1;
		$middle = round( $last - $first / 2, 0, PHP_ROUND_HALF_DOWN);

		while ( $middle >= 0 && $middle <= $last) {
			if($number_list[$middle] == $needle) {
				return $middle;
			} else if ($number_list[$middle] < $needle) {
				$last = $middle - 1;
			} else if ($number_list[$middle] > $needle) {
				$first = $middle + 1;
			}
			$middle = round( $last - $first / 2, 0, PHP_ROUND_HALF_DOWN);
		}

		return -1;
	}

}