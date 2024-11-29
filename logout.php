<!DOCTYPE html>
<html>
    <head>
        <title>Logout Confirmation</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header class="w3-center w3-black w3-container">
            <h1>Logout Confirmation</h1>
        </header>
        <?php 
            session_start();
            session_destroy();
        ?>
        <p1 class="w3-monospace" style="font-size:17px;">&nbspUser has successfully logged out. Please return to the login screen.</p1>
        <footer class= "w3-center w3-monospace w3-dark-grey w3-container">
            <?php
            $date = date_create();

            echo "Today's date is ".date_format($date, "M j, Y");
            ?>

            <form class="w3-margin w3-center" action="index.php" method="POST">
                <input type="submit" value="Return to Login">
            </form>
        </footer>
    </body>
</html>