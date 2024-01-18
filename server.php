<?php
require 'dbConn.php';
include ("funcs.inc.php");
require 'vendor/autoload.php';

/* Test
echo "Date: " . $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now')->format('Y-m-d') . "</br>";
echo "Company: " . $faker->company() . "</br>";
echo "Qty: " . $faker->numberBetween($min = 0, $max = 1000) . "</br>";

$arrayFaker[0] = array(
    "date" => "fecha",
    "company" => "comp",
    "qty" => "qty",
);

print_r($arrayFaker);
echo "</br>";
$arrayFaker[1]["date"] = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now')->format('Y-m-d');
print_r($arrayFaker[1]);
echo "</br>";
*/
/**/
// Obtención de datos de la API y posteriormente expuestos.
$arrayFaker = getDataAPI();
//print_r($arrayFaker); Test.
/**/
?>