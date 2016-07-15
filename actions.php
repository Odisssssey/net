<?php


 if (isset($_POST['send'])){
		
	$box =__DIR__."/files/{$_FILES['fi']["name"]}";
	var_dump($_FILES['fi']);
	if(move_uploaded_file($_FILES['fi']["tmp_name"], $box))
	{
		echo "norm";
	}

}

	
