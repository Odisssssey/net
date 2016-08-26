<?php
 session_start();
?>
<html>
  <head>
      <meta charset="utf-8">
  </head>
  <body>
  
    <p>

 <form method="post">
 <input type="textbox" name="addres" placeholder="<?php if (isset($_POST['addres'])){echo $_POST['addres'];}else{echo 'адрес';}?>"> 
<?php
ini_set('display_errors','Off');
$addres = htmlspecialchars($_POST['addres']);
require __DIR__.'/vendor/autoload.php';

$api = new \Yandex\Geo\Api();

// Можно искать по точке
//$api->setPoint(30.5166187, 50.4452705);

// Или можно икать по адресу
$api->setQuery("{$addres}");

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
if (!empty($latitude)){
 ?>
  Широта: <input type="textbox" name="Latitude" placeholder="широта" value="<?= "{$latitude}" ?>" >
  Долгота: <input type="textbox" name="Longitude" placeholder="долгота" value="<?= "{$longitude}" ?>" >

<?php  }?>
  <input type="submit" name="search" value="Искать" />
</form>
    <script src="http://maps.google.com/maps?file=api&amp;"
            type="text/javascript"></script>
    <script type="text/javascript">
 
    function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(<?= "{$latitude}" ?>,<?= "{$longitude}" ?>), 12);
      }
    }
	window.onload = initialize;
    </script>

    <div id="map_canvas" style="width: 100%; height: 96%"></div>

</body>
</html>