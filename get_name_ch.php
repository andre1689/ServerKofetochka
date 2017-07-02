<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$ID_CH = $_REQUEST[ID_CH];
$r = mysqli_query($con, "SELECT Name_CH FROM CoffeeHouse WHERE ID_CH='".$ID_CH."'");
if (mysqli_num_rows($r) > 0)
{
 while($row=mysqli_fetch_array($r))
        {
                $coffeehouse[Name_CH] = $row[Name_CH];
        }
}
echo (json_encode($coffeehouse));
?>
