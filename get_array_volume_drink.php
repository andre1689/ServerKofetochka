<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Name_Drink = $_REQUEST[Name_Drink];
$r = mysqli_query($con, "SELECT Volume_Drink FROM Drink WHERE Name_Drink='".$Name_Drink."' GROUP BY Volume_Drink");
if (mysqli_num_rows($r) > 0)
{
	$response["volumes_drink"] = array();
        while($row=mysqli_fetch_array($r))
        {
                $volume_drink = array();
		$volume_drink[Volume_Drink] = $row[Volume_Drink];
		array_push($response["volumes_drink"], $volume_drink);
	}
}
echo (json_encode($response));
?>
