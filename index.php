<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header class="w3-center w3-black w3-container">
            <h1>Login</h1>
        </header>
        <p1 class="w3-monospace" style="font-size:17px;">&nbspPlease login in. If you do not have an account, please create one using the registration button.</p1>
        <div class="w3-bottombar w3-border-dark-grey">
            <form class="w3-margin w3-center" action="login-logic.php" method="POST">
                <label for="returningUsername">Username:&nbsp</label>
                <input type="text" name="returningUsername" id="returningUsername" required><br>
                <label for="returningPassword">Password:&nbsp</label>
                <input type="password" name="returningPassword" id="returningPassword" required><br>
                <input type="submit" value="Login">
            </form>
        </div>

        <form class="w3-margin w3-center" action="registration-form.php" method="POST">
            <input type="submit" value="Register">
        </form>


        <footer class= "w3-center w3-monospace w3-dark-grey w3-container">
            <?php
            $date = date_create();

            echo "Today's date is ".date_format($date, "M j, Y");
            ?>
        </footer>
    </body>
</html>