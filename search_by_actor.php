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
                $selected_actor = $_POST['actor'];
                $res = $conn->query("SELECT DISTINCT film.name as name, actor.name as actor_name FROM film
                INNER JOIN film_actor ON film_actor.film_id = film.id
                INNER JOIN actor ON actor.id = film_actor.actor_id
                WHERE actor.name = '$selected_actor'");

                echo '<p> Found ', $res->num_rows, ' films</p>';

                while($row = $res->fetch_assoc()) {
                    echo "<div>Title: ", $row["name"], "</div>";
                }
            }
        ?>
    </body>
</html>