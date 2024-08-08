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
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js"></script>
    <title>Change Profile</title>
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
            }
            
            echo "<a href='edit.php?Id=$res_id'><button class='btn'>Profile</button></a>";
            ?>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $profession = $_POST['profession'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $holder = $_POST['holder'];
                $cardnumber = $_POST['cardnumber'];
                $valid = $_POST['valid'];
                $cvv = $_POST['cvv'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Age='$age' ,profession='$profession',holder='$holder',cardnumber='$cardnumber',valid='$valid',cvv='$cvv' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='home.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_pro = $result['profession'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                    $res_holder = $result['holder'];
                    $res_cardnumber = $result['cardnumber'];
                    $res_valid = $result['valid'];
                    $res_cvv = $result['cvv'];
                }

            ?>
            <header>Change UserProfile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="profession">User Profession :</label>
                    <input type="text" name="profession" id="profession" value="<?php echo $res_pro; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email :</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age :</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="holder">Holder :</label>
                    <input type="text" name="holder" id="holder" value="<?php echo $res_holder; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="cardnumber">Cardnmber :</label>
                    <input type="number" name="cardnumber" id="cardnumber" min="1" max="16" value="<?php echo $res_cardnumber; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="valid">Valid :</label>
                    <input type="text" name="valid" id="valid" value="<?php echo $res_valid; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="cvv">Cvv :</label>
                    <input type="number" name="cvv" id="cvv" value="<?php echo $res_cvv; ?>" autocomplete="off" required>
                </div>
                
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
                
            </form>
        </div>
        <div class="card">
            <div class="card-inner">
                <div class="front">
                    <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                    <div class="row">
                        <img src="https://i.ibb.co/G9pDnYJ/chip.png" width="60px">
                        <img src="https://i.ibb.co/WHZ3nRJ/visa.png" width="60px">
                    </div>
                    <div class="row card-no">
                        <p><?php echo $res_cardnumber; ?></p>

                    </div>
                    <div class="row card-holder">
                        <p>Holder</p>
                        <p>Die Before </p>
                    </div>
                    <div class="row name">
                        <p><?php echo $res_holder; ?></p>
                        <p><?php echo $res_valid; ?></p>
                    </div>
                </div>
                <div class="back">
                    <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                    <div class="row card-cvv">
                        <div>
                            <img src="https://i.ibb.co/S6JG8px/pattern.png">
                        </div>
                        <p><?php echo $res_cvv; ?></p>
                    </div>
                    <div class="row card-text">
                        <p>This simple card made for my project with unlimited money on it so don't use it chumma 😕</p>
                    </div>
                    <div class="row signature">
                        <img src="https://i.ibb.co/WHZ3nRJ/visa.png" width="80px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* card */
.card {
    width: 500px;
    height: 300px;
    color: #fff;
    cursor: pointer;
    perspective: 1000px;
}

.card-inner {
    width: 100%;
    height: 100%;
    position: relative;
    transition: transform 1s;
    transform-style: preserve-3d;
}

.front, .back {
    width: 100%;
    height: 100%;
    background-image: linear-gradient(45deg, #0045c7, #ff2c7d);
    position: absolute;
    top: 0;
    left: 0;
    padding: 20px 30px;
    border-radius: 15px;
    overflow: hidden;
    z-index: 1;
    backface-visibility: hidden;
}

.row {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.map-img {
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0.3;
    z-index: -1;
}

.card-no {
    font-size: 35px;
    margin-top: 60px;
}

.card-holder {
    font-size: 12px;
    margin-top: 40px;
}

.name {
    font-size: 22px;
    margin-top: 20px;
}

.card-cvv {
    margin-top: 20px;
}

.card-cvv div {
    flex: 1;
}

.card-cvv img {
    width: 100%;
    display: block;
    line-height: 0;
}

.card-cvv p {
    background: #fff;
    color: #000;
    font-size: 22px;
    padding: 10px 20px;
}

.card-text {
    margin-top: 30px;
    font-size: 14px;
}

.signature {
    margin-top: 30px;
}

.back {
    transform: rotateY(180deg);
}

.card:hover .card-inner {
    transform: rotateY(-180deg);
}
    </style>
        <?php } ?>
      </div>
</body>
</html>