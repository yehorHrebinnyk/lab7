<html>
    <head>
        <title>GENRE FILTER</title>
    <head>
    <body>
        <form id="form" method="post" action="/lab5/search_by_genre.php">
            <input type="text", name="genre" placeholder="Genre: "> <br>
            <input type="submit" value="Find!">
        </form>

        <form id="form" method="post" action="/lab5/search_by_actor.php">
            <input type="text", name="actor" placeholder="Actor: "> <br>
            <input type="submit" value="Find!">
        </form>

        <form id="form" method="post" action="/slab5/search_by_year.php">
            FROM: <input type="number", name="from" placeholder="YYYY">
            TO: <input type="number", name="to" placeholder="YYYY">
            <br>
            <input type="submit" value="Find!">
        </form>
    </body>
</html>