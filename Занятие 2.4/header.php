<?php
require_once("fanctions.php"); 
?>

<?php
if (!isGuest() == true){
  header('Location: index.php'); 
}
?>

<?php echo "Ваше имя: "."{$_SESSION['login']}"." | "."<a href='exit.php'>Выйти</a>"; ?>
<?php echo "<hr/><br/>"; ?>