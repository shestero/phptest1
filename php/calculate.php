<?php
require_once "db.php";

/** Calculate user's balance
 * @throws Exception if user has no records
 */
function balance(int $user_id)
{
    $sql =
        "SELECT paid_to, paid_by, amount FROM transactions ".
        "WHERE paid_to=$user_id OR paid_by=$user_id";
    // $user_id is integer, I hope this avoids injections.
    // Note correct transaction order isn't important here.

    global $mysqli;
    $stream = $mysqli->query($sql, MYSQLI_USE_RESULT); // unbuffered mode

    $amount = 0.0; // initial balance
    while ($row = $stream->fetch_object()) {
        if ($row->paid_to==$user_id && $row->paid_by!=$user_id) {
            $amount += $row->amount;
        } else if ($row->paid_to!=$user_id && $row->paid_by==$user_id) {
            $amount -= $row->amount;
        }
    }
    $rows = $stream->num_rows;
    $stream->close();

    if ($rows<=0) {
        throw new Exception("User $user_id not found!");
    } else {
        return $amount;
    }
}
