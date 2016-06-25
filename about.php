<html>
<head>
    <title>Anton</title>
    <meta charset="utf-8">
        <style>
            .new1{
				width: 100%;
				height: auto;	
				}
			.new2{
				width: auto;
				height: auto;
				float: left;				
				}
        </style>
</head>
<body>
				<div class="new1" ><h1>About myself.</h1></div>
            <div class="new2" ><a> <table><td>Имя</td></table> 
                                   <table><td>Возраст</td></table>
                                   <table><td>Адрес электронной почты</td></table>
                                   <table><td>Город</td></table>
                                   <table><td>О себе</td></table></a>
            </div>
            <div class="new2" >
			<?php
        $name = 'Anton';
        $age = 19;
        $mail = 'Good_man5@mail.ru';
        $city = 'Kostroma';
        $aboutys = 'student';
        
        
        
            echo '<table><td>'.$name.'</td></table>';
            echo '<table><td>'.$age.'</td></table>';
            echo '<table><td>'.$mail.'</td></table>';
            echo '<table><td>'.$city.'</td></table>';
            echo '<table><td>'.$aboutys.'</td></table>';

           


        
        ?>
			</div>

</body>
</html>


