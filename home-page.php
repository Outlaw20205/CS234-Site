<!DOCTYPE html>
<html>
    <head>
        <title>Database Search</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header class="w3-center w3-black w3-container">
            <h1>Welcome to the circuit database</h1>
        </header>
        <p1 class="w3-monospace" style="font-size:17px;">&nbspTo search a track, type in the name of a country.</p1>
        <div class="w3-bottombar w3-border-dark-grey">

        <form class="w3-margin w3-center" action="database-search.php" method="POST">
            <label for="countryName">Country:&nbsp</label>
            <input type="text" name="countryName" id="countryName" required><br>
            <input type="submit" value="Search">
        </form>

        <?php
            session_start();
            if ($_SESSION["Admin"] == "Approved") {
                echo '
                    <form class="w3-margin w3-center" action="database-editor.php" method="POST">
                        <input type="submit" value="Admin Page">
                    </form>';
            }
        ?>

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