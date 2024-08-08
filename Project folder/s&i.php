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
    <link rel="stylesheet" href="css/s&i.css">
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
                    <li><a href="table.php">Transaction Breakdown</a></li>
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
        <div class="wrapper">
            <div class="left-panel">
                <h1 class="app-title">Savings and Investments Module</h1>
                <div class="input-section">
                    <label for="initial-amount">Initial Lump Sum to be Invested (£):</label>
                    <input type="number" id="initial-amount" min="0" step="0.01" required>
                    <label for="monthly-amount">Monthly Amount to be Invested (£):</label>
                    <input type="number" id="monthly-amount" min="0" step="0.01" required>
                    <label for="investment-type">Select Investment Type:</label>
                    <select id="investment-type">
                        <option value="basic">Basic Savings Plan</option>
                        <option value="plus">Savings Plan Plus</option>
                        <option value="managed">Managed Stock Investments</option>
                    </select>
                    <button id="calculate-button">Calculate</button>
                </div>
                <div id="results"></div>
            </div>
            <div class="right-panel">
                <h2 class="graph-heading">Returns Chart</h2>
                <canvas id="returns-chart" class="graph"></canvas>
                <h2 class="graph-heading">Returns Bar Chart</h2>
                <canvas id="returns-bar-chart" class="graph"></canvas>
                <h2 class="graph-heading">Minimum Returns Chart</h2>
                <canvas id="min-returns-chart" class="graph"></canvas> <!-- Moved min returns chart here -->
                <h2 class="graph-heading">Fees Chart</h2>
                <canvas id="fees-chart" class="graph"></canvas>
                <h2 class="graph-heading">Taxes Chart</h2>
                <canvas id="taxes-chart" class="graph"></canvas>
                <h2 class="graph-heading">Profits Chart</h2>
                <canvas id="profits-chart" class="graph"></canvas>
                <h2 class="graph-heading">Profits Line Chart</h2>
                <canvas id="profits-line-chart" class="graph"></canvas> <!-- Moved profits line chart here -->
            </div>
        </div>
        <script src="js/s&i.js"></script>
        <!-- Include Chart.js library -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </main>


</body>
</html>
        