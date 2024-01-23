<?php
header('Content-Type: application/json; charset=utf-8');

/** Use this do output normal results. */
function out_ok($result)
{
    $output = array("status" => "success", "payload" => $result);
    echo json_encode($output);
}

/** Use this do output error message. */
function out_err($error)
{
    $output = array("status" => "error", "payload" => $error);
    echo json_encode($output);
}
