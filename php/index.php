<?php
require_once "output.php";

$user_id = @$_REQUEST["user_id"];
if (empty($user_id)) {
    out_err("user_id parameter not set!");
    return;
}

require_once "db.php";
require_once "calculate.php";

try {
    $balance = balance($user_id);
    $output = array("balance" => $balance); // may simplify: $output = $balance
    out_ok($output);
} catch (Exception $exception) {
    out_err($exception->getMessage()); // user not found
} catch (TypeError $error) {
    out_err($error->getMessage()); // user_id not integer
}

// graceful close database (for the good)
global $mysqli;
$mysqli->close();
