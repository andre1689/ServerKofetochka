<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Date_Shift = $_REQUEST[Date_Shift];
//$Time_Shift = $_REQUEST[Time_Shift];
$ID_CH = $_REQUEST[ID_CH];
$Login = $_REQUEST[Login];

$r = mysqli_query($con, "SELECT ID_Shift FROM `Shift` WHERE (Date_Shift='".$Date_Shift."') AND (ID_CH='".$ID_CH."') AND (Login='".$Login."')");
//AND (Time_Shift='".$Time_Shift."')
if (mysqli_num_rows($r) > 0)
{
 while($row=mysqli_fetch_array($r))
        {
                $shift[ID_Shift] = $row[ID_Shift];
        }
}
echo (json_encode($shift));
?>
