<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Table = $_REQUEST[Table];
$r = mysqli_query($con, "SELECT Name_Additives FROM ".$Table);
if (mysqli_num_rows($r) > 0)
{
	$response["names_additives"] = array();
        while($row=mysqli_fetch_array($r))
        {
                $name_additives = array();
		$name_additives[Name_Additives] = $row[Name_Additives];
		array_push($response["names_additives"], $name_additives);
	}
}
echo (json_encode($response));
?>
