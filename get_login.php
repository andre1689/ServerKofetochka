<?php
require_once __DIR__ . '/db_config.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}
$Login = $_REQUEST[Login];
//$Login = 'Admin';
$r = mysqli_query($con, "SELECT * FROM Identification WHERE Login='".$Login."'");
if (mysqli_num_rows($r) > 0)
{
        while($row=mysqli_fetch_array($r))
        {
                $identification[Login] = $row[Login];
                $identification[Password] = $row[Password];
		$identification[Surname] = $row[Surname];
		$identification[Name] = $row[Name];
		$identification[Middlename] = $row[Middlename];
		$identification[Block] = $row[Block];
                $identification[ID_role] = $row[ID_role];
        }
}
echo (json_encode($identification));

?>
