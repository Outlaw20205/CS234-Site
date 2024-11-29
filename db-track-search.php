<?php
function searchPDO($pdo) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search_type'];
        $country = $_POST['country_name'];
        $circuit = $_POST['cir_name'];
    }

    if (isset($search)) {
        if ($search == "all") {
            $sql = "SELECT * FROM track_db";
            $statement = $pdo->prepare($sql);
            $statement->execute();

            echo "<div class = 'w3-container'>
                <table class = 'w3-table w3-center w3-border'>";

            echo "<tr class = 'w3-blue'>
                <th>Country</th>
                <th>Circuit Name</th>
                <th>Length</th>
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
        elseif ($search == "cir" && isset($circuit)) {
            $sql = "SELECT * FROM track_db WHERE circuit_name = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$circuit]);

            echo "<div class = 'w3-container'>
                <table class = 'w3-table w3-center w3-border'>";

            echo "<tr class = 'w3-blue'>
                <th>Country</th>
                <th>Circuit Name</th>
                <th>Length</th>
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
        elseif ($search == "country" && isset($country)) {
            $sql = "SELECT * FROM track_db WHERE country = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$country]);

            echo "<div class = 'w3-container'>
                <table class = 'w3-table w3-center w3-border'>";

            echo "<tr class = 'w3-blue'>
                <th>Country</th>
                <th>Circuit Name</th>
                <th>Length</th>
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
        else {
            echo "No values selected.";
            echo "
                <form action='home-page.php' method='POST'>
                    <input type='submit' value='Return to Home Page'>
                </form>";
                $pdo = null;
        }
    }
    else {
        echo "No values selected.";
        echo "
            <form action='home-page.php' method='POST'>
                <input type='submit' value='Return to Home Page'>
            </form>";
            $pdo = null;
    }
}
?>

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
            $dsn='mysql:host=localhost;dbname=project';
            $username_db="root";
            $password_db="root";
            
            $pdo = new PDO($dsn, $username_db, $password_db);
            
            searchPDO($pdo);

            $pdo = null;
        ?>

        <form class = "w3-center w3-padding" action='home-page.php' method='POST'>
        <input type='submit' value='Return to Home Page'>
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