<?php 

class Admission {


	public function islogin(){
		if (isset($_SESSION['isLogin']))
		{
		 return true;
		}else{
		 return false;
		 }
	}
	
	public function isAdmin(){
		if (isset($_SESSION['isAdmin']))
		{
		 return true;
		}else{
		 return false;
		 }
	}
}
?>