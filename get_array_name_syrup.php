<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Table = $_REQUEST[Table];
$r = mysqli_query($con, "SELECT Name_Syrup FROM Syrup");
if (mysqli_num_rows($r) > 0)
{
	$response["names_syrup"] = array();
        while($row=mysqli_fetch_array($r))
        {
                $name_syrup = array();
		$name_syrup[Name_Syrup] = $row[Name_Syrup];
		array_push($response["names_syrup"], $name_syrup);
	}
}
echo (json_encode($response));
?>
