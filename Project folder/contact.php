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
    <link rel="stylesheet" href="css/contact.css">
    <script src="script.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
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
    <div class="container">
		<main class="row">
			<section class="col left">
				
				<div class="contactTitle">
					<h2>Get In Touch</h2>
					<p>We waiting for your message</p>
				</div>

				<div class="contactInfo">
					
					<div class="iconGroup">
						<div class="icon">
							<i class="fa-solid fa-phone"></i>
						</div>
						<div class="details">
							<span>Phone</span>
							<span>+91 1100 1100 11</span>
						</div>
					</div>

					<div class="iconGroup">
						<div class="icon">
							<i class="fa-solid fa-envelope"></i>
						</div>
						<div class="details">
							<span>Email</span>
							<span>Economy.Finances@gmail.com</span>
						</div>
					</div>

					<div class="iconGroup">
						<div class="icon">
							<i class="fa-solid fa-location-dot"></i>
						</div>
						<div class="details">
							<span>Location</span>
							<span>42 HahaStreet, Chuckle Pradesh 567890</span>
						</div>
					</div>

				</div>



			</section>
			<section class="col right">
				
				<form class="messageForm">
					
					<div class="inputGroup halfWidth">
						<input type="text" name="" required="required">
						<label>Your Name</label>
					</div>

					<div class="inputGroup halfWidth">
						<input type="email" name="" required="required">
						<label>Email</label>
					</div>

					<div class="inputGroup fullWidth">
						<input type="text" name="" required="required">
						<label>Subject</label>
					</div>

					<div class="inputGroup fullWidth">
						<textarea required="required"></textarea>
						<label>Say Something</label>
					</div>

					<div class="inputGroup fullWidth">
						<button>Send Message</button>
					</div>

				</form>
			</section>

		</main>
	</div>
</body>
</html>