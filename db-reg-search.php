<?php
function searchPDO($pdo) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search_type'];
        $id = $_POST['id_num'];
        $username = $_POST['username_txt'];
    }

    if (isset($search)) {
        if ($search == "all") {
            $sql = "SELECT * FROM registration";
            $statement = $pdo->prepare($sql);
            $statement->execute();

            echo "<div class = 'w3-container'>
                <table class = 'w3-table w3-center w3-border'>";

            echo "<tr class = 'w3-blue'>
                <th>ID Num</th>
                <th>Username</th>
                <th>Hash</th>
                <th>Admin Approval</th>
            </tr>";

            while ($output_list = $statement->fetch()) {
                echo "<tr>
                    <td>{$output_list['id']}</td>
                    <td>{$output_list['username']}</td>
                    <td>{$output_list['password']}</td>
                    <td>{$output_list['admin']}</td>
                </tr>";
            }
            echo "</table></div>";
        }
        elseif ($search == "id" && isset($id)) {
            $sql = "SELECT * FROM registration WHERE id = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$id]);

            echo "<div class = 'w3-container'>
                <table class = 'w3-table w3-center w3-border'>";

            echo "<tr class = 'w3-blue'>
                <th>ID Num</th>
                <th>Username</th>
                <th>Hash</th>
                <th>Admin Approval</th>
            </tr>";

            while ($output_list = $statement->fetch()) {
                echo "<tr>
                    <td>{$output_list['id']}</td>
                    <td>{$output_list['username']}</td>
                    <td>{$output_list['password']}</td>
                    <td>{$output_list['admin']}</td>
                </tr>";
            }
            echo "</table></div>";
        }
        elseif ($search == "username" && isset($username)) {
            $sql = "SELECT * FROM registration WHERE username = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$username]);

            echo "<div class = 'w3-container'>
                <table class = 'w3-table w3-center w3-border'>";

            echo "<tr class = 'w3-blue'>
                <th>ID Num</th>
                <th>Username</th>
                <th>Hash</th>
                <th>Admin Approval</th>
            </tr>";

            while ($output_list = $statement->fetch()) {
                echo "<tr>
                    <td>{$output_list['id']}</td>
                    <td>{$output_list['username']}</td>
                    <td>{$output_list['password']}</td>
                    <td>{$output_list['admin']}</td>
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