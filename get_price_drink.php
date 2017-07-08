<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Name_Drink = $_REQUEST[Name_Drink];
$Volume_Drink = $_REQUEST[Volume_Drink];
$r = mysqli_query($con, "SELECT Price_Drink FROM Drink WHERE (Name_Drink='".$Name_Drink."') AND (Volume_Drink='".$Volume_Drink."')");
if (mysqli_num_rows($r) > 0)
{
 while($row=mysqli_fetch_array($r))
        {
                $drink[Price_Drink] = $row[Price_Drink];
        }
}
echo (json_encode($drink));
?>
