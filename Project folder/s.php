<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="s.css">
    <script src="script.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <button class="hamburger" onclick="show()">
            <div id="bar1" class="bar"></div>
            <div id="bar2" class="bar"></div>
            <div id="bar3" class="bar"></div>
           </button>

           <nav class="navigation">
            <ul>
                <li><a href="convertor.php">Budget Tracking</a></li>
                <li><a>Transaction Breakdown</a></li>
                <li><a href="calculator.php">Income Breakdown</a></li>
                <li><a>Expense Categorization</a></li>
                <li><a href="financialgoals.php">Financial Goals</a></li>
                <li><a href="convertor.php">Currencies Convertor</a></li>
                <li><a href="calculator.php">Calculator</a></li>
            </ul>
           </nav>
        <div class="logo">
            <p><a href="home.php">Economy Finances</a> </p>
        </div>

        <div class="right-links">
          <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
                $res_profession= $result['profession'];
            }
            
            echo "<a href='edit.php?Id=$res_id'><button class='btn'>Profile</button></a>";
            ?>
        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?>(<?php echo $res_profession ?>)</b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="middle">
          <div class="box1">
                <?php
                $id = $_SESSION['id'];
                $sql = "SELECT SUM(amount) as total FROM transaction WHERE userid = $id ";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $totalAmount = $row['total'];
                ?>
                <h1>Total Transactions: -<?php echo number_format($totalAmount, 2); ?></h1>
            </div>
            <div class="box1">
                <?php
                $id = $_SESSION['id'];
                $currentMonth = date('m');
                $currentYear = date('Y');
                $sql = "SELECT SUM(amount) as total FROM transaction WHERE userid = $id AND MONTH(transaction_date) = $currentMonth AND YEAR(transaction_date) = $currentYear";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $totalMonthlyExpense = $row['total'];
                ?>
                <h1>Monthly Expense Summary: <?php echo number_format($totalMonthlyExpense, 2); ?></h1>
            </div>
            <div class="box1">
                <h3>Financial Tip of the Day</h3>
                <p>Remember to create a monthly budget and stick to it. Tracking your expenses can help you identify areas where you can save money and reach your financial goals faster.</p>
            </div>

          </div>
          <div class="bottom">
            <div class="box2">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <div class="box2">
                <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
                <?php
                $link=mysqli_connect("localhost","root","");
                mysqli_select_db($link,"tutorial");
                $currencies = array('GBP', 'USD', 'EUR', 'BRL', 'JPY', 'TRY');
                $currencyData = array();

                foreach ($currencies as $currency) {
                    $sql = "SELECT transaction_date, SUM(amount) as total FROM transaction WHERE userid = $id AND currency = '$currency' GROUP BY transaction_date";
                    $result = mysqli_query($con, $sql);

                    $dataPoints = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $dataPoints[] = array(
                            "x" => strtotime($row['transaction_date']) * 1000,
                            "y" => floatval($row['total'])
                        );
                    }

                    $currencySymbol = "";
                    switch ($currency) {
                        case 'GBP':
                            $currencySymbol = "£";
                            break;
                        case 'USD':
                            $currencySymbol = "$";
                            break;
                        case 'EUR':
                            $currencySymbol = "€";
                            break;
                        case 'BRL':
                            $currencySymbol = "R$";
                            break;
                        case 'JPY':
                            $currencySymbol = "¥";
                            break;
                        case 'TRY':
                            $currencySymbol = "₺";
                            break;
                        default:
                            $currencySymbol = "";
                            break;
                    }

                    $currencyData[] = array(
                        "type" => "spline",
                        "name" => $currency,
                        "showInLegend" => true,
                        "markerSize" => 5,
                        "xValueFormatString" => "YYYY-MM-DD",
                        "yValueFormatString" => "$currencySymbol#,##0.##",
                        "xValueType" => "dateTime",
                        "dataPoints" => $dataPoints
                    );
                }
                ?>

            </div>
          </div>
       </div>
    </main>
    <script>
        window.onload = function () {
            // Initialize pie chart data points
            var dataPoints = [];

            // Initialize pie chart
            var chart = new CanvasJS.Chart("chartContainer", {
                title:{
                    text: "Transaction Currency Distribution"
                },
                data: [
                    {
                        type: "pie",
                        indexLabel: "{label} : #percent%",
                        toolTipContent : "{label}: {y} transactions",
                        dataPoints: dataPoints 
                    }                   
                ]
            });
            <?php
            session_start();
            $servername = "localhost";
            $username = "root"; // Your MySQL username
            $password = ""; // Your MySQL password
            $dbname = "tutorial"; // Your MySQL database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $id = $_SESSION['id'];
            // SQL query to fetch data
            $sql = "SELECT currency, COUNT(*) as count FROM transaction WHERE userid = $id GROUP BY currency";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo 'dataPoints.push({ label: "' . $row["currency"] . '", y: ' . $row["count"] . ' });';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
            // Initialize line chart
            var lineChart = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                title:{
                    text: "Transaction Currency Distribution"
                },
                data: <?php echo json_encode($currencyData, JSON_NUMERIC_CHECK); ?>
            });

            // Render both charts
            chart.render();
            lineChart.render();
        }
    </script>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div class="footer">@ 2024 Copyright:<strong><a href="index.php">Economy Finance</a></strong>.</div>

</body>
</html>
