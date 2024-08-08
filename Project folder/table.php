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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
        <div style="width:100%">
            <div class="row">
                 <div class="col-md-9">
                    <div class="card">
                    <div class="card-body">
                   
                    <button class="btn"> <a href="newtran.php" class="text-light"> Add New </a> </button>
                        
                        <br/>
                        <br/>

                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php

                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection,"tutorial");
                                $id = $_SESSION['id'];
                                $sql = "select * from transaction where userid=$id";
                                $run = mysqli_query($connection, $sql);
                                $id= 1;

                                while($row = mysqli_fetch_array($run))
                                {
                                    $id = $row['id'];
                                    $currency = $row['currency'];
                                    $amount = $row['amount'];
                                    $data = $row['transaction_date'];
                                ?>

                                   <tr>
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $currency ?></td>
                                        <td><?php echo $amount ?></td>
                                        <td><?php echo $data ?></td>

                                        <td>
                                        
                                       <button class="btn btn-danger"><a href='trandel.php?del=<?php echo $id ?>' class="text-light"> Delete </a> </button>
                                        </td>
                                   </tr>
                                    <?php $id++; } ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        
</body>
</html>