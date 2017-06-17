<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$ID = $_REQUEST[ID];
//$ID=2;
$r = mysqli_query($con, "SELECT * FROM Role WHERE ID_role='".$ID."'");
if (mysqli_num_rows($r) > 0)
{
        while($row=mysqli_fetch_array($r))
        {
                $role[Name_role] = $row[Name_role];
        }
}
echo (json_encode($role));

?>
