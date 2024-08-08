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
    <link rel="stylesheet" href="css/admin.css">
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
                <li><a href="userlist.php"></a></li>
                <li><a href="stafflist.php">Staff List</a></li>
           </nav>
        <div class="logo">
            <p><a href="admin.php">Economy Finances</a> </p>
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
            }
            
            echo "<a href='adminprofile.php?Id=$res_id'><button class='btn'>Profile</button></a>";
            ?>
        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?> Staff</b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="middle">
          <div class="box1">
                <?php
                // Query to get total number of users
                $sql_users = "SELECT COUNT(*) as total_users FROM users WHERE role ='user'";
                $result_users = mysqli_query($con, $sql_users);
                $row_users = mysqli_fetch_assoc($result_users);
                $totalUsers = $row_users['total_users'];
                ?>
                <h1>Total User: <?php echo $totalUsers; ?></h1>
            </div>
            <div class="box1">
                <?php
                $sql_staff = "SELECT COUNT(*) as total_staff FROM users WHERE role = 'staff'";
                $result_staff = mysqli_query($con, $sql_staff);
                $row_staff = mysqli_fetch_assoc($result_staff);
                $totalStaff = $row_staff['total_staff'];
                ?>
                <h1>Total Staff: <?php echo $totalStaff; ?></h1>
            </div>
            <div class="box1">
                <h3>Financial Tip of the Day</h3>
                <p>As an admin, it's crucial to monitor financial activities closely and ensure proper budget allocation across departments. Implementing effective financial management strategies can lead to improved organizational efficiency and long-term success.</p>
            </div>


          </div>
          <div class="bottom">
                <div class="box2">
                    <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
                    <?php
                    // Query to get total number of users
                    $sql_users = "SELECT COUNT(*) as total_users FROM users WHERE role = 'user'";
                    $result_users = mysqli_query($con, $sql_users);
                    $row_users = mysqli_fetch_assoc($result_users);
                    $totalUsers = $row_users['total_users'];

                    // Query to get total number of staff
                    $sql_staff = "SELECT COUNT(*) as total_staff FROM users WHERE role = 'staff'";
                    $result_staff = mysqli_query($con, $sql_staff);
                    $row_staff = mysqli_fetch_assoc($result_staff);
                    $totalStaff = $row_staff['total_staff'];

                    // Prepare data for the chart
                    $chartData = array(
                        array("label" => "Users", "y" => $totalUsers),
                        array("label" => "Staff", "y" => $totalStaff)
                    );
                    ?>

                    <script>
                        window.onload = function () {
                            var chart = new CanvasJS.Chart("chartContainer1", {
                                animationEnabled: true,
                                title: {
                                    text: "Distribution of Users and Staff"
                                },
                                data: [{
                                    type: "column",
                                    dataPoints: <?php echo json_encode($chartData, JSON_NUMERIC_CHECK); ?>
                                }]
                            });
                            chart.render();
                        }
                    </script>
                </div>
            </div>
        </main>

<div class="footer">@ 2024 Copyright:<strong><a href="index.php">Economy Finance</a></strong>.</div>

</body>
</html>
