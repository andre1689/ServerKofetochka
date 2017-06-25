<?php
$shift = array();
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$Date_Shift = $_REQUEST[Date_Shift];
$Time_Shift = $_REQUEST[Time_Shift];
$ID_CH = $_REQUEST[ID_CH];

if (isset($Date_Shift) && isset($Time_Shift) && isset($ID_CH)) {
	$r = mysqli_query($con, "INSERT INTO `Shift` (`Date_Shift`, `Time_Shift`, `ID_CH`) VALUES ('".$Date_Shift."', '".$Time_Shift."', '".$ID_CH."')");
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
