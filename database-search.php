<!DOCTYPE html>
<html>
    <head>
        <title>Database Result</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <header class="w3-center w3-black w3-container">
            <h1>Database Results</h1>
        </header>

<?php

function printDataTable($name_ISO) {
    global $pdo;

    $sql = "SELECT countries_db.country, circuit_name, length, turns 
    FROM track_db, countries_db WHERE countries_db.country_abr = ? AND track_db.country = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$name_ISO, $name_ISO]);

    echo "<div class = 'w3-container'>
    <table class = 'w3-table w3-center w3-border'>";

    echo "<tr class = 'w3-blue'>
            <th>Country</th>
            <th>Circuit Name</th>
            <th>Length (miles)</th>
            <th>Turns</th>
        </tr>";

    while ($output_list = $statement->fetch()) {
    echo "<tr>
        <td>{$output_list['country']}</td>
        <td>{$output_list['circuit_name']}</td>
        <td>{$output_list['length']}</td>
        <td>{$output_list['turns']}</td>
    </tr>";
    }
    echo "</table></div>";

}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $country = $_POST['countryName'];
    }

    $dsn='mysql:host=localhost;dbname=project';
    $username_db="root";
    $password_db="root";
        
    $pdo = new PDO($dsn, $username_db, $password_db);

    $sql = "SELECT country, country_abr FROM countries_db WHERE country = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$country]);

    $output = $statement->fetch();

    if (isset($output['country'])) {
        echo "<p1 class = 'w3-monospace'>
        &nbspISO-3166: {$output['country_abr']} = {$output['country']}
        </p1>";

        printDataTable($output['country_abr']);
    }
    else {
        echo "Country doesn't exist in the database or invalid input.";
    }

    $pdo = null;
?>

        <form class = "w3-center w3-padding" action='home-page.php' method='POST'>
        <input type='submit' value='Access Home Page'>
        </form>

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