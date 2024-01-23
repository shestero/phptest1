<?php
/** MySQL access */

$db_host = $_ENV["MYSQL_HOST"] ?? "localhost";
$db_user = $_ENV["MYSQL_USER"] ?? "shestero";
$db_pwd  = $_ENV["MYSQL_PASSWORD"] ?? "";
$db_name = $_ENV["MYSQL_DATABASE"] ?? "test1";

$mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);

// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
