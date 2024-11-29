<!DOCTYPE html>
<html>
    <head>
        <title>Track Insert</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header class="w3-center w3-black w3-container">
            <h1>Track Insert</h1>
        </header>
        <p1 class="w3-monospace" style="font-size:17px;">&nbspTo insert to the Track database, please insert the following info:</p1>
        <div class="w3-bottombar w3-border-dark-grey">

        <div class = "w3-container"> 
            <form class="w3-margin w3-center" action="db-track-insert.php" method="POST">
                <label for = "abr">Country Abr (ISO-3166): </label>
                <input type = "text" name = "abr" id = "abr" required><br>
                <label for = "cir_name">Circuit Name: </label>
                <input type = "text" name = "cir_name" id = "cir_name" required><br>
                <label for = "length">Circuit Length (miles): </label>
                <input type = "text" name = "length" id = "length" required><br>
                <label for = "turns">Number of Turns: </label>
                <input type = "number" name = "turns" id = "turns" required><br>
                <input type = "submit" value = "Confirm">
            </form>
        </div>

        <footer class= "w3-center w3-monospace w3-dark-grey w3-container">
            <?php
            $date = date_create();

            echo "Today's date is ".date_format($date, "M j, Y");
            ?>
        </footer>
    </body>
</html>