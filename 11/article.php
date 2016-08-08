<?php


if (isset($_GET['id'])) $id = (int) $_GET['id'];

if (isset($_GET['action'])) $action = $_GET['action'];


$note_core = new Note_Core();
if (!empty($id))
{
	$note_core->$action($id);
}else{
	$note_core->$action();
	
}

