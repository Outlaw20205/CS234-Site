<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
    <header class="w3-center w3-black w3-container">
            <h1>Registration</h1>
        </header>
        <p1 class="w3-monospace" style="font-size:17px;">&nbspPlease create an account. Make sure your username is unique.</p1>
        <div>
            <form class="w3-margin w3-center" action="registration-logic.php" method="POST">
                <label for="newUsername">Username:&nbsp</label>
                <input type="text" name="newUsername" id="newUsername" required><br>
                <label for="newPWD">Password:&nbsp</label>
                <input type="password" name="newPWD" id="newPWD" required><br>
                <input type="submit" value="Register">
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