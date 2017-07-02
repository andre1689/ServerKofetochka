<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$ID_Shift = $_REQUEST[ID_Shift];
$r = mysqli_query($con, "SELECT ID_St FROM Storage WHERE (ID_Shift='".$ID_Shift."') AND (OpenShift_St='0')");
if (mysqli_num_rows($r) > 0)
{
 while($row=mysqli_fetch_array($r))
        {
                $storage[ID_St] = $row[ID_St];
        }
}
echo (json_encode($storage));
?>
