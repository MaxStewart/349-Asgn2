<!DOCTYPE html>
<html>
<head>
    <title>Frontend</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Verdana, serif;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<?php

$db_host = 'cosc349db.c2omwcd3vted.us-east-1.rds.amazonaws.com';
$db_name = 'COSC349DB';
$db_user = 'admin';
$db_pass = 'password';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_pass);

?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SpendTrack</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="graph.php">Spending Graph</a>
            <a class="nav-item nav-link active" href="databaseContents.php">Database</a>
        </div>
    </div>
</nav>

<div class="text-center">
    <img src="banner.png" class="rounded" style="margin-top: 20px">
</div>

<div class="container-fluid col-11">
    <div class="justify-content-center text-center">
        <hr>
        <h3>Purchases</h3>
        <table>
            <tr>
                <th>Title</th>
                <th>Amount ($)</th>
                <th>Category</th>
                <th>Date (YYYY-MM-DD)</th>
                <th>Notes</th>
                <th>Remove</th>
            </tr>
            <?php
            $query = $pdo->query("SELECT * FROM purchases");
            while ($row = $query->fetch()) {
                echo "<tr>
                        <td>$row[name]</td>
                        <td>$$row[amount]</td>
                        <td>$row[category]</td>
                        <td>$row[date]</td>
                        <td>$row[notes]</td>
                        <td><a href='deleteItem.php?id=".$row['id']."'>Delete</a></td>
                     </tr>";
                }
            ?>
        </table>
    </div>
</div>

<footer style="position: relative; width: 100%">
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        Max Stewart, Megan Starnes
    </div>
</footer>

</body>
</html>