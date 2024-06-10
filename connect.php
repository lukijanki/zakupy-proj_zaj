<?php
$servername = "zakupyproj-server.mysql.database.azure.com";
$username = "aatinfwcrt";
$password = "xl2mPu$6bFyOIp3g";
$db_name = "zakupyproj-database";

$conn = new mysqli($servername, $username, $password, $db_name, 3306);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
