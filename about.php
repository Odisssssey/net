<html>
<head>
    <title>Anton</title>
    <meta charset="utf-8">
        <style>
            .new1{
                padding: 0px 5px;
				width: 100%;
				height: auto;	
				}
			.new2{
			    padding: 0px 10px;
				width: auto;
				height: auto;
				float: left;				
				}
        </style>
</head>
<body>
				<div class="new1" ><h1>About myself.</h1></div>
            <div class="new2" ><a><p>Имя</p> 
                                   <p>Возраст</p>
                                   <p>Адрес электронной почты</p>
                                   <p>Город</p>
                                   <p>О себе</p>
            </div>
            <div class="new2" >
			<?php
        $name = 'Anton';
        $age = 19;
        $mail = 'Good_man5@mail.ru';
        $city = 'Kostroma';
        $aboutys = 'student';
        
         ?>
        
            <p><?= $name ?></p>  
            <p><?= $age ?></p>
            <a href=<?= $mail ?>><?= $mail ?></a>
            <p><?= $city ?></p>
            <p><?= $aboutys ?></p>

        
			</div>

</body>

