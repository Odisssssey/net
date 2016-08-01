<?php 
function isGuest(){
	if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin']) || isset($_SESSION['isGurst']))
	{
	 return true;
	}else{
	 return false;
	 }
}
?>


<?php 
if (isGuest() == true){
	require "header.php";
}else{
  header('Location: index.php'); 
}
?>