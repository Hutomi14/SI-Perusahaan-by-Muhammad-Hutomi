<?php
		
	if (!function_exists('menuAktif')){

		function menuAktif($url = ""){
			$ci =& get_instance();

			if($ci->uri->uri_string() == $url){
				return 'active';
			}
	    }   

	}