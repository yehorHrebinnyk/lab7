<html>
    <head>
        <title>GENRE FILTER</title>
        <script>
            window.onload = () => {
                document.getElementById('click1').addEventListener('click', e => {
                    let value = document.getElementById("genre").value;
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "http://localhost/lab7/search_by_genre.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = () => {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            let block = document.getElementById('block');
                            block.innerHTML = "";
                            block.innerHTML = xhr.responseText;
                        }
                    }

                    xhr.send("genre=".concat('', value));
                });

                document.getElementById('click2').addEventListener('click', e => {
                    let value = document.getElementById("actor").value;
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "http://localhost/lab7/search_by_actor.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = () => {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            let block2 = document.getElementById('block2');
                            block2.innerHTML = "";
                            for (let item of xhr.responseXML.getElementsByTagName('root')[0].children) {
                                console.log(item.textContent);
                                if (item.tagName == "h1")
                                    block2.innerHTML += "<h1>".concat('', item.textContent, '</h1>');
                                else if (item.tagName == "p")
                                    block2.innerHTML += "<p>".concat('', item.textContent, '</p>');
                                else if (item.tagName == "div")
                                    block2.innerHTML += "<div>".concat('', item.textContent, '</div>');
                            }
                        }
                    }

                    xhr.send("actor=".concat('', value));
                });

                document.getElementById('click3').addEventListener('click', e => {
                    let from = document.getElementById("from").value;
                    let to = document.getElementById("to").value;
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "http://localhost/lab7/search_by_year.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = () => {
                        let items = JSON.parse(xhr.response);
                        let block3 = document.getElementById('block3');
                        block3.innerHTML = "";
                        block3.innerHTML += "<h1>Search results</h1>";
                        block3.innerHTML += "<p>".concat('', "Found ", items.length.toString(), ' films', '</p>');
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            for (let item of items) {
                                block3.innerHTML += "<p>".concat('', item, "</p>");
                            }
                        }
                    }
                    xhr.send("from=".concat('', from) + '&' + "to=".concat('', to));
                });
            }
        </script>
    <head>
    <body>
        <form id="form">
            <input type="text", name="genre" id="genre" placeholder="Genre: "> <br>
            <input type="button" value="Find!" id="click1">
        </form>
        <div id="block">

        </div>
        <form id="form1">
            <input type="text", name="actor" id="actor" placeholder="Actor: "> <br>
            <input type="button" value="Find!" id="click2">
        </form>
        <div id="block2">

        </div>

        <form id="form2">
            FROM: <input type="number", name="from" id="from" placeholder="YYYY">
            TO: <input type="number", name="to" id="to" placeholder="YYYY">
            <br>
            <input type="button" value="Find!" id="click3">
        </form>

        <div id="block3">

        </div>
    </body>
</html>