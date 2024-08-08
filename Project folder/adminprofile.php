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
                <li><a href="">Currencies Convertor</a></li>
                <li><a>About</a></li>
                <li><a>Blog</a></li>
                <li><a>Contact</a></li>
                <li><a>Contact</a></li>
                <li><a>Contact</a></li>
                <li><a>Contact</a></li>
                <li><a>Contact</a></li>
                <li><a>Contact</a></li>
            </ul>
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

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Age='$age' ,profession='$profession',holder='$holder',cardnumber='$cardnumber',valid='$valid',cvv='$cvv' WHERE Id=$id ") or die("error occurred");

                if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
              echo "<a href='admin.php'><button class='btn'>Go Home</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_pro = $result['profession'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
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
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
                
            </form>
        </div>
    </div>
        <?php } ?>
      </div>
</body>
</html>