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

		$list_size = $last - $first + 1;
		if($list_size == 1 && $number_list[$first] !== $needle ) {
		 	return -1;
		}
		$middle = self::middle($first, $last);

		if ($number_list[$middle] == $needle){
			return $middle;
		} else if ($needle < $number_list[$middle]) {
			return self::binary_chop($needle, $first, $middle -1 , $number_list);
		} else if ($needle > $number_list[$middle]) {
			return self::binary_chop($needle, $middle +1, $last , $number_list);
		}
	}

	private function binary_chop_it($needle, $number_list) {

		$list_size = count($number_list);
		$first = 0;
		$last = $list_size - 1;
		$middle = self::middle($first, $last);

		while ( $first <= $last ) {
			if($number_list[$middle] == $needle) {
				return $middle;
			} else if ($needle < $number_list[$middle]) {
				$last = $middle - 1;
			} else if ($needle > $number_list[$middle]) {
				$first = $middle + 1;
			}
			$middle = self::middle($first, $last);
		}

		return -1;
	}

	private function middle($first, $last) {
		return round( ($last + $first) / 2, 0, PHP_ROUND_HALF_DOWN);
	}

}