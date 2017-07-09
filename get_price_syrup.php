<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Name_Syrup = $_REQUEST[Name_Syrup];
$r = mysqli_query($con, "SELECT Price_Syrup FROM Syrup WHERE Name_Syrup='".$Name_Syrup."'");
if (mysqli_num_rows($r) > 0)
{
 while($row=mysqli_fetch_array($r))
        {
                $syrup[Price_Syrup] = $row[Price_Syrup];
        }
}
echo (json_encode($syrup));
?>
