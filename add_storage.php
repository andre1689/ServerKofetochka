<?php
$shift = array();
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
/*
$OpenShift_St = "1";
$DiceBox_150_St = "1";
$DiceBox_200_St = "2";;
$DiceBox_300_St = "3";
$DiceBox_400_St = "4";
$DiceBox_Summer_St = "5";
$Coffee_1kg_St = "6";
$Coffee_250g_St = "7";
$DripCoffee_St = "8";
$Exchange_St = "9";
$ID_Shift = "2";*/

$OpenShift_St = $_REQUEST[OpenShift_St];
$DiceBox_150_St = $_REQUEST[DiceBox_150_St];
$DiceBox_200_St = $_REQUEST[DiceBox_200_St];
$DiceBox_300_St = $_REQUEST[DiceBox_300_St];
$DiceBox_400_St = $_REQUEST[DiceBox_400_St];
$DiceBox_Summer_St = $_REQUEST[DiceBox_Summer_St];
$Coffee_1kg_St = $_REQUEST[Coffee_1kg_St];
$Coffee_250g_St = $_REQUEST[Coffee_250g_St];
$DripCoffee_St = $_REQUEST[DripCoffee_St];
$Exchange_St = $_REQUEST[Exchange_St];
$ID_Shift = $_REQUEST[ID_Shift];

if (isset($OpenShift_St) && isset($DiceBox_150_St) && isset($DiceBox_200_St) && isset($DiceBox_300_St) && isset($DiceBox_400_St) && isset($DiceBox_Summer_St) && isset($Coffee_1kg_St) && isset($Coffee_250g_St) && isset($DripCoffee_St) && isset($Exchange_St) && isset($ID_Shift)) {
	$r = mysqli_query($con, "INSERT INTO `Storage` (`OpenShift_St`, `DiceBox_150_St`, `DiceBox_200_St`, `DiceBox_300_St`, `DiceBox_400_St`, `DiceBox_Summer_St`, `Coffee_1kg_St`, `Coffee_250g_St`, `DripCoffee_St`, `Exchange_St`, `ID_Shift`) VALUES ('".$OpenShift_St."', '".$DiceBox_150_St."', '".$DiceBox_200_St."', '".$DiceBox_300_St."', '".$DiceBox_400_St."', '".$DiceBox_Summer_St."', '".$Coffee_1kg_St."', '".$Coffee_250g_St."', '".$DripCoffee_St."', '".$Exchange_St."', '".$ID_Shift."')");
	if($r){
		$shift[Success] = 1;
		$shift[Message] = "Смена создана.";
		echo (json_encode($shift));
	} else {
		$shift[Success] = 0;
		$shift[Message] = "Ошибка! Смена не создана.";
		echo (json_encode($shift));
		}
} else {
    $shift[Success] = 0;
    $shift[Message] = "Обязательное поле отсутвует";
    echo (json_encode($shift));
}
?>
