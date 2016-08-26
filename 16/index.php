<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>

 <form method="post">
 <input type="textbox" name="addres" placeholder="адрес"> 
<?php

ini_set('display_errors','Off');
require __DIR__.'/vendor/autoload.php';

$api = new \Yandex\Geo\Api();

// Можно искать по точке
//$api->setPoint(30.5166187, 50.4452705);

// Или можно икать по адресу
$api->setQuery("{$_POST['addres']}");

// Настройка фильтров
$api
    ->setLimit(1) // кол-во результатов
    ->setLang(\Yandex\Geo\Api::LANG_US) // локаль ответа
    ->load();

$response = $api->getResponse();
$response->getFoundCount(); // кол-во найденных адресов
$response->getQuery(); // исходный запрос
$response->getLatitude(); // широта для исходного запроса
$response->getLongitude(); // долгота для исходного запроса

// Список найденных точек
$collection = $response->getList();
foreach ($collection as $item) {
    $item->getAddress(); // вернет адрес
    $latitude = $item->getLatitude(); // широта
    $longitude = $item->getLongitude(); // долгота
    $item->getData(); // необработанные данные
}
?>
 <?php
 if (!empty($_POST['Latitude'])){
 ?>
  Широта: <input type="textbox" name="Latitude" placeholder="широта" value="<?= "{$latitude}" ?>" >
  Долгота: <input type="textbox" name="Longitude" placeholder="долгота" value="<?= "{$longitude}" ?>" >

<?php  }?>
  <input type="submit" name="search" value="Искать" />
</form>






</body>
</html>