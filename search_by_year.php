<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
        include_once "init_db.php";
        $req = $conn->prepare("SELECT name FROM film
                WHERE date >= :from AND date <= :to");
        header('Content-Type:application/json');
        header("Cache-Control: no-cache, must-revalidate");
        $from = $_POST["from"];
        $to = $_POST["to"];
        $req->execute(array(':from' => $from, ':to' => $to));
        $res = $req->fetchAll();
        $response = array();

        foreach($res as $row) {
            array_push($response, $row["name"]);
        }

        echo json_encode($response);
    }
?>