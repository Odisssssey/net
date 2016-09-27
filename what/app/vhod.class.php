<?php 

class Vhod {


	public function errors(){
		if (!empty($_SESSION['error'])){
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}
	}
	
	


	
	


}


