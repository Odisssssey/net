<?php 

require_once "city.class.php";
require_once "profile.class.php";

$me = new Profile('kasatkinart');

echo $me->name;