<?php
		
	if (!function_exists('menuAktif')){

		function menuAktif($url = ""){
			$ci =& get_instance();

			if($ci->uri->segment(2) == $url){
				return 'active';
			}
	    }   

	}