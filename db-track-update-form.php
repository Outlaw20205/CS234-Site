<!DOCTYPE html>
<html>
    <head>
        <title>Track Update</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header class="w3-center w3-black w3-container">
            <h1>Track Update</h1>
        </header>
        <p1 class="w3-monospace" style="font-size:17px;">&nbspTo update the Track database, please insert the following info:</p1>
        <div class="w3-bottombar w3-border-dark-grey">

        <div class = "w3-container"> 
            <form class="w3-margin w3-center" action="db-track-update.php" method="POST">
                <label for = "circuit_cur">Circuit Name: </label>
                <input type = "text" name = "circuit_cur" id = "circuit_cur" required><br>
                <label for = "length_update">New Circuit Length (miles): </label>
                <input type = "text" name = "length_update" id = "length_update" required><br>
                <label for = "turns_update">New Number of Turns: </label>
                <input type = "number" name = "turns_update" id = "turns_update" required><br>
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