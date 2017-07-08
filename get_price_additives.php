<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Name_Additives = $_REQUEST[Name_Additives];
$r = mysqli_query($con, "SELECT Price_Additives FROM Additives WHERE Name_Additives='".$Name_Additives."'");
if (mysqli_num_rows($r) > 0)
{
 while($row=mysqli_fetch_array($r))
        {
                $additives[Price_Additives] = $row[Price_Additives];
        }
}
echo (json_encode($additives));
?>
