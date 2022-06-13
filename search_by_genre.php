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
                $selected_genre = $_POST['genre'];
                $res = $conn->query("SELECT DISTINCT film.name as name, t2.title as genre FROM film
                INNER JOIN film_genre as t1 ON t1.film_id = film.id
                INNER JOIN genre as t2 ON t2.id = t1.genre_id
                WHERE t2.title = '$selected_genre'");

                echo '<p> Found ', $res->num_rows, ' films</p>';

                while($row = $res->fetch_assoc()) {
                    echo "<div>Title: ", $row["name"], '; ', $row["genre"],  "</div>";
                }
            }
        ?>
    </body>
</html>