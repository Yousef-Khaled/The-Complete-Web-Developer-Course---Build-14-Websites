<?php

$s = $_POST['City'];
$s = str_replace(" ", "", $s);
$page = file_get_contents('http://www.weather-forecast.com/locations/'.$s.'/forecasts/latest');
preg_match('/3 Day Weather Forecast Summary:<\/b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">(.*?)<\/span>/s', $page, $a);

echo $a[1];
?>


