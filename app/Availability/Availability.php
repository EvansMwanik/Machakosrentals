<?php

namespace vacantrentals\Availability;

Class Availability{
	
	public static function display($Availability){

		if ($available == 0){
			echo"Rental Available";
		}else if($available == 1){
			echo "Rental not Available";
		}
	}
	public static function displayClass($available) {
		if ($available == 0) {
			echo "green";
			
		} else if($available == 1){
			echo "red";
		}
	}
}

