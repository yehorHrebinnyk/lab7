<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
        include_once "init_db.php";
        $req = $conn->prepare("SELECT DISTINCT film.name as name, t2.title as genre FROM film
                    INNER JOIN film_genre as t1 ON t1.film_id = film.id
                    INNER JOIN genre as t2 ON t2.id = t1.genre_id
                    WHERE t2.title = :selected_genre");
        $selected_genre = $_POST['genre'];
        $req->execute(array(':selected_genre' => $selected_genre));
        $res = $req->fetchAll();
        echo "<h1>SEARCH RESULTS</h1>";
        echo '<p> Found ', count($res), ' films</p>';

        foreach($res as $row) {
            echo "<div>Title: ", $row["name"], '; ', $row["genre"],  "</div>";
        }
    }
?>