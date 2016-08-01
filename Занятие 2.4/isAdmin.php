<?php 
function isAdmin(){
	if (isset($_SESSION['isPassword']) || isset($_SESSION['islogin']))
	{
	 return true;
	}else{
	 return false;
	 }
}
?>


<?php 
if (isAdmin() == true){
	require "header.php";
}else{
  header('Location: 403.php', true); 
}
?>