<?php 
class FileReader {

	public $filepath = "";

	public function getLines($filepath) {
		$this->filepath = $filepath;

		if (!$this->valid_file()) {
			throw new Exception("Error reading file", 1);
		}

		$lines = file($filepath);
		return $lines;
	}

	private function valid_file() {
		return is_readable($this->filepath);
	}
}