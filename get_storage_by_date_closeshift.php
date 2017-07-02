<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$ID_Shift = $_REQUEST[ID_Shift];
$r = mysqli_query($con, "SELECT `DiceBox_150_St`, `DiceBox_200_St`, `DiceBox_300_St`, `DiceBox_400_St`, `DiceBox_Summer_St`, `Coffee_1kg_St`, `Coffee_250g_St`, `DripCoffee_St`, `Exchange_St` FROM `Storage` WHERE (ID_Shift='".$ID_Shift."') AND (OpenShift_St='0')");
if (mysqli_num_rows($r) > 0)
{
 while($row=mysqli_fetch_array($r))
        {
                $storage[DiceBox_150_St] = $row[DiceBox_150_St];
                $storage[DiceBox_200_St] = $row[DiceBox_200_St];
                $storage[DiceBox_300_St] = $row[DiceBox_300_St];
                $storage[DiceBox_400_St] = $row[DiceBox_400_St];
                $storage[DiceBox_Summer_St] = $row[DiceBox_Summer_St];
                $storage[Coffee_1kg_St] = $row[Coffee_1kg_St];
                $storage[Coffee_250g_St] = $row[Coffee_250g_St];
                $storage[DripCoffee_St] = $row[DripCoffee_St];
                $storage[Exchange_St] = $row[Exchange_St];

        }
}
echo (json_encode($storage));
?>
