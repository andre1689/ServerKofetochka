<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Column = $_REQUEST[Column];
$Query = $_REQUEST[Query];
$r = mysqli_query($con, $Query);
if (mysqli_num_rows($r) > 0)
{
 while($row=mysqli_fetch_array($r))
        {
                $res[$Column] = $row[$Column];
        }
}
echo (json_encode($res));
?>
