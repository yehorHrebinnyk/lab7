<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
        include_once "init_db.php";
        header('Content-Type:text/xml');
        header("Cache-Control: no-cache, must-revalidate");

        $selected_actor = $_POST['actor'];
        $req = $conn->prepare("SELECT DISTINCT film.name as name, actor.name as actor_name FROM film
                    INNER JOIN film_actor ON film_actor.film_id = film.id
                    INNER JOIN actor ON actor.id = film_actor.actor_id
                    WHERE actor.name = :selected_actor");
        $req->execute(array(':selected_actor' => $selected_actor));
        $res = $req->fetchAll();
        echo "<?xml version='1.0' encoding='utf8' ?>";
        echo "<root>";
        echo "<h1>SEARCH RESULTS</h1>";
        echo '<p> Found ', count($res), ' films</p>';

        foreach($res as $row) {
            echo "<div>Title: ", $row["name"], "</div>";
        }

        echo "</root>";
    }
?>