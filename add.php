<?php
$res = array();
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Query = $_REQUEST[Query];
if (isset($Query)) {
	$r = mysqli_query($con, $Query);
	if($r){
		$res[Success] = 1;
		$res[Message] = "Запись добавлена";
		echo (json_encode($res));
	} else {
		$res[Success] = 0;
		$res[Message] = "Ошибка! Запись не добавлена";
		echo (json_encode($res));
		}
} else {
    $res[Success] = 0;
    $res[Message] = "Обязательное поле отсутвует";
    echo (json_encode($res));
}
?>
