<?php 
function islogin(){
	if (isset($_SESSION['isLogin']))
	{
	 return true;
	}else{
	 return false;
	 }
}
?>