<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "itech";

    try {
        $conn = new PDO("mysql:host = $servername; dbname=$dbname", $username, $password, array());
    }
    catch(PDOException $e)
    {
        echo "[Error]: ", $e->getMessage(), "<br/>";
        die();
    }
?>