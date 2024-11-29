<!DOCTYPE html>
<html>
    <head>
        <title>Database Editor</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header class="w3-center w3-black w3-container">
            <h1>Welcome to the circuit database editor</h1>
        </header>
        <p1 class="w3-monospace" style="font-size:17px;">&nbspTo edit the database, please use make a selection</p1>
        <div class="w3-bottombar w3-border-dark-grey">

        <div class = "w3-container"> 
            <form class="w3-margin w3-center" action="database-editor-logic.php" method="POST">
                <input type = "radio" name = "actionVal" value = "insert">
                <label for = "insert">Insert</label>
                <input type = "radio" name = "actionVal" value = "search">
                <label for = "search">Search</label>
                <input type = "radio" name = "actionVal" value = "update">
                <label for = "update">Update</label>
                <input type = "radio" name = "actionVal" value = "delete">
                <label for = "delete">Delete</label><br>
                <input type = "radio" name = "db_select" value = "track">
                <label for = "track">Track</label>
                <input type = "radio" name = "db_select" value = "country">
                <label for = "country">Countries</label>
                <input type = "radio" name = "db_select" value = "reg">
                <label for = "reg">Registration</label><br>
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