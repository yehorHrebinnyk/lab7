<?php
    include_once "init_db.php";
    header('Content-Type:application/json');
    header("Cache-Control: no-cache, must-revalidate");
    $from = $_POST["from"];
    $to = $_POST["to"];
    $res = $conn->query("SELECT name FROM film
    WHERE date >= '$from' AND date <= '$to'");
    $response = array();

    while($row = $res->fetch_assoc()) {
        array_push($response, $row["name"]);
    }

    echo json_encode($response);
?>