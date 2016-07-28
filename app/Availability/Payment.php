<?php

namespace vacantrentals\Payment;

Class Payment{
	
	public static function display($Payment){

		if ($payment == 0){
			echo"Paid";
		}else if($payment == 1){
			echo "Not Paid";
		}
	}
	public static function displayClass($payment) {
		if ($payment == 0) {
			echo "red";
			
		} else if($payment == 1){
			echo "green";
		}
	}
}
