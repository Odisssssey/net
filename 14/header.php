<?php
require_once("fanctions.php"); 
?>

<?php
if (!islogin() == true){
  header('Location: vhod.php'); 
}
?>

<?php echo "Ваше имя: "."{$_SESSION['login']}"." | "."<a href='exit.php'>Выйти</a>"; ?>
<?php echo "<hr/><br/>"; ?>