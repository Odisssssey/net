<?php 
function islogin(){
	if (isset($_SESSION['islogin']))
	{
	 return true;
	}else{
	 return false;
	 }
}
?>