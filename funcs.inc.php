<?php
require 'vendor/autoload.php';
require_once 'dbConn.php';

function getDataAPI(){
    // Conexión a BD.
    $bd = new DBconn;
    $bd->connect();

    $faker = Faker\Factory::create();

    for($i=0; $i<1000; $i++){
        $arrayFaker[$i]["date"] = $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now')->format('Y-m-d');
        $arrayFaker[$i]["company"] = $faker->company();
        $arrayFaker[$i]["qty"] = $faker->numberBetween($min = 0, $max = 1000);
        
        /*Test
        echo $arrayFaker[$i]["date"] . "</br>";
        echo $arrayFaker[$i]["company"] . "</br>";
        echo $arrayFaker[$i]["qty"] . "</br></br>";
        /**/

        $bd->insert($arrayFaker[$i]["date"], $arrayFaker[$i]["company"], $arrayFaker[$i]["qty"]); //Desactivado para ahcer tests
    }

    return $arrayFaker;
}
?>