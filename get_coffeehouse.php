<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

$r = mysqli_query($con, "SELECT * FROM CoffeeHouse");
if (mysqli_num_rows($r) > 0)
{
	$response["coffeehouses"] = array();
        while($row=mysqli_fetch_array($r))
        {
                $coffeehouse = array();
                $coffeehouse[ID_CH] = $row[ID_CH];
		$coffeehouse[Name_CH] = $row[Name_CH];
		$coffeehouse[Address_CH] = $row[Address_CH];

		array_push($response["coffeehouses"], $coffeehouse);
	}
}
echo (json_encode($response));
?>
