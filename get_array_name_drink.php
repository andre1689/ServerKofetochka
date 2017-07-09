<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Table = $_REQUEST[Table];
$Season = $_REQUEST[Season];
$r = mysqli_query($con, "SELECT Name_Drink FROM `".$Table."` WHERE Season LIKE '%".$Season."%' GROUP BY Name_Drink");
if (mysqli_num_rows($r) > 0)
{
	$response["names_drink"] = array();
        while($row=mysqli_fetch_array($r))
        {
                $name_drink = array();
		$name_drink[Name_Drink] = $row[Name_Drink];
		array_push($response["names_drink"], $name_drink);
	}
}
echo (json_encode($response));
?>
