<?php
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
   }

    if(isset($_POST['submit']))
        {
          $currency = $_POST['currency'];
          $amount = $_POST['amount'];
          $id = $_SESSION['id'];

           $sql = "insert into transaction(userid,currency,amount)values('$id',' $currency',' $amount')";

           if(mysqli_query($connection,$sql))
           {
                  echo '<script> location.replace("table.php")</script>';  
           }
           else
           {
           echo "Some thing Error" . $connection->error;
           }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

        <div class="container">
            <div class="row">
                 <div class="col-md-9">
                    <div class="card">
                    <div class="card-header">
                        <h1> Student Crud Application </h1>
                    </div>
                    <div class="card-body">

                    <form action="newtran.php" method="post">
                        <div class="form-group">
                            <label>Currency</label>
                            <input type="text" name="currency" class="form-control"  placeholder="Enter Name"> 
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control"  placeholder="Enter Address"> 
                        </div>
                        <br/>
                        <input type="submit" class="btn btn-primary" name="submit" value="Add">
                        </form>
                   
                    </div>
                    </div>

                </div>
            
            </div>
        </div>

</body>
</html>