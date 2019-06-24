<?php
		
	if (!function_exists('apakahLogin')){

		function apakahLogin(){
			$ci =& get_instance();

			if(!$ci->session->userdata('logged_in')){
				return false;
			}

			//kalau login
			return true;
	    }   

		function apakahLoginRedirect(){
			$ci =& get_instance();

			if(!$ci->session->userdata('logged_in')){
				redirect('login');
			}

			//kalau login
			return true;
	    }   


	}