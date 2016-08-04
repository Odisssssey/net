<?php 
function isAdmin(){
	if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin']))
	{
	 return true;
	}else{
	 return false;
	 }
}

function isGuest(){
	if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin']) || isset($_SESSION['isGurst']))
	{
	 return true;
	}else{
	 return false;
	 }
}
?>