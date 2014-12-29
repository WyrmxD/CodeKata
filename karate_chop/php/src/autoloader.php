<?php 
	
	function myAutoload($class){
		$filename = __DIR__ . "/" .$class . '.php';
		if (file_exists($filename)) {
			include($filename);
		}
	}

	spl_autoload_register("myAutoload");
?>