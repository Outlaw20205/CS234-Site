<!DOCTYPE html>
<html>
    <head>
        <title>Registration Search</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header class="w3-center w3-black w3-container">
            <h1>Registration Search</h1>
        </header>
        <p1 class="w3-monospace" style="font-size:17px;">&nbspTo search the Registration database, please select an option and insert a query:</p1>
        <div class="w3-bottombar w3-border-dark-grey">

        <div class = "w3-container"> 
            <form class="w3-margin w3-center" action="db-reg-search.php" method="POST">
                <input type = "radio" name = "search_type" value = "username">
                <label for = "username">Search an Username</label>
                <input type = "radio" name = "search_type" value = "id">
                <label for = "id">Search an ID Number</label>
                <input type = "radio" name = "search_type" value = "all">
                <label for = "all">Search All</label><br>
                <label for = "username_txt">Username: </label>
                <input type = "text" name = "username_txt" id = "username_txt"><br>
                <label for = "id_num">ID Number: </label>
                <input type = "number" name = "id_num" id = "id_num"><br>
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