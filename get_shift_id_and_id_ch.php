<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Date_Shift = $_REQUEST[Date_Shift];
$Login = $_REQUEST[Login];
$r = mysqli_query($con, "SELECT ID_Shift, ID_CH FROM `Shift` WHERE (Date_Shift='".$Date_Shift."') AND (Login='".$Login."')");

if (mysqli_num_rows($r) > 0)
{
 while($row=mysqli_fetch_array($r))
        {
                $shift[ID_Shift] = $row[ID_Shift];
		$shift[ID_CH] = $row[ID_CH];
        }
}
echo (json_encode($shift));
?>
