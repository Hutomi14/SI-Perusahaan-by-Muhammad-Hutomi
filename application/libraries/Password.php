<?php
	
	class Password {

		public function hash($password){

			$hash = password_hash($password, PASSWORD_BCRYPT);

			return $hash;
		}

		public function verify($password, $hash){

			if(password_verify($password, $hash)){
				return true;
			}

			return false;
		
		}

	}