<?php
$db_host = '192.168.33.14';
$db_name = 'fvision';
$db_user = 'webuser';
$db_pass = 'Alexander';

$categoryErrorString = "";
$spendErrorString = "";
$interval = "yearly";
$dataPoints = array();
$yearTotal = array();

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_pass);
$query = $pdo->query("SELECT * FROM purchases ORDER BY date");

if(isset($_POST['submitInterval'])){
    $interval = $_POST['interval'];
}

if($interval === "monthly"){
    while($row = $query->fetch()){
        $date = explode("-", $row["date"]);
        $input = $date[1] . "/" . $date[0];
        $yearTotal[$input] += $row["amount"];
    }
}
elseif ($interval === "category"){
    while($row = $query->fetch()){
        $yearTotal[$row["category"]] += $row["amount"];
    }
}
else {
    while($row = $query->fetch()){
        $year = explode("-", $row["date"]);
        $yearTotal[$year[0]] += $row["amount"];
    }
}

foreach ($yearTotal as $key => $value) {
    array_push($dataPoints, array("y" => $value, "label" => $key, "toolTipContent" => "Category: " . $key . "<br> Spent: $" . $value . " (NZD)"));
}

?>

<!DOCTYPE html>
<html>
<head>

    <script>
        window.onload = function () {
            <?php if($interval !== "category") { ?>
                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Spending"
                    },
                    axisY: {
                        title: "Amount (NZD)"
                    },
                    data: [{
                        type: "line",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
            <?php } else { ?>
                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Spending"
                    },
                    axisY: {
                        title: "Amount (NZD)"
                    },
                    data: [{
                        type: "column",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();
            <?php } ?>
        }
    </script>

    <title>SpendTrack - Graph</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Verdana, serif;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SpendTrack</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="graph.php">Spending Graph</a>
            <a class="nav-item nav-link" href="databaseContents.php">Database</a>
        </div>
    </div>
</nav>

<div class="text-center">
    <img src="banner.png" class="rounded" style="margin-top: 20px">
</div>

<div class="container-fluid">
    <div class="justify-content-center">
        <hr>
        <div class="row">
            <div class="col-8">
                <h1>Spending Graph</h1>
            </div>
            <div class="col-4">
                <button class="btn btn-primary btn-lg btn-block" onclick="window.location.href='index.php'" name="goToTracking">Add Spending</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Pick an interval graph your spending to.</p>
            </div>
        </div>
        <hr>
    </div>
</div>

<div class="container p-3">
    <div class="row justify-content-center">
        <form name="add-spend-form" method="post" id="add-spend-form">
            <div class="form-row">
                <div class="col-8">
                    <select name="interval" class="form-control form-control-sm">
                        <option value="monthly" <?php if($interval === "monthly") echo "selected"; ?>>Monthly</option>
                        <option value="yearly" <?php if($interval === "yearly") echo "selected"; ?>>Yearly</option>
                        <option value="category" <?php if($interval === "category") echo "selected"; ?>>Category</option>
                    </select>
                </div>
                <div class="col-4">
                    <button class="btn btn-primary btn-sm" type="submit" name="submitInterval">Graph</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>

<footer style="position: fixed; left: 0; bottom: 0; width: 100%">
    <div class="footer-copyright text-center py-3">
        © 2018 Copyright: Max Stewart, Megan Starnes
    </div>
</footer>

</body>
</html>