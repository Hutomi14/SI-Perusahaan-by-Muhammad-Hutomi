<?php
		
	if (!function_exists('menuAktif')){

		function menuAktif($url = ""){
			$ci =& get_instance();

			if($ci->router->fetch_class() == $url){
				return 'active';
			}
	    }   

	}