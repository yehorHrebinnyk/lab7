<?php
    include "init_db.php";
?>

<html>
    <head>
        <title>FILTER RESULTS</title>
    <head>
    <body>
        <h1>
            SEARCH RESULTS:
        </h1>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
                $from = $_POST["from"];
                $to = $_POST["to"];
                $res = $conn->query("SELECT name FROM film
                WHERE date >= '$from' AND date <= '$to'");

                echo '<p> Found ', $res->num_rows, ' films</p>';

                while($row = $res->fetch_assoc()) {
                    echo "<div>Title: ", $row["name"], "</div>";
                }
            }
        ?>
    </body>
</html>