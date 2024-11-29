<!DOCTYPE html>
<html>
    <head>
        <title>Track Search</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header class="w3-center w3-black w3-container">
            <h1>Track Search</h1>
        </header>
        <p1 class="w3-monospace" style="font-size:17px;">&nbspTo search the Country database, please select an option and insert a query:</p1>
        <div class="w3-bottombar w3-border-dark-grey">

        <div class = "w3-container"> 
            <form class="w3-margin w3-center" action="db-track-search.php" method="POST">
                <input type = "radio" name = "search_type" value = "cir">
                <label for = "cir">Search a Circuit</label>
                <input type = "radio" name = "search_type" value = "country">
                <label for = "country">Search a Country</label>
                <input type = "radio" name = "search_type" value = "all">
                <label for = "all">Search All</label><br>
                <label for = "country_name">Country Abr (ISO-3166): </label>
                <input type = "text" name = "country_name" id = "country_name"><br>
                <label for = "cir_name">Circuit Name: </label>
                <input type = "text" name = "cir_name" id = "cir_name"><br>
                <input type = "submit" value = "Confirm">
            </form>
        </div>

        <footer class= "w3-center w3-monospace w3-dark-grey w3-container">
            <?php
            $date = date_create();

            echo "Today's date is ".date_format($date, "M j, Y");
            ?>
            <form class="w3-margin w3-center" action="logout.php" method="POST">
                <input type="submit" value="Logout">
            </form>
        </footer>
    </body>
</html>