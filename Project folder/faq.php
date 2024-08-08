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
    <link rel="stylesheet" href="css/faq.css">
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
    <h2>Frequently Asked Questions</h2>
    <div class="accordion">
        <div class="accordion-item">
        <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">I can't access the website. What should I do?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
            <p>Please check your internet connection first. If the issue persists, try clearing your browser cache or accessing the site from a different browser. If the problem continues, there might be a server issue, and you may want to contact the website administrator.</p>
        </div>
        </div>
        <div class="accordion-item">
        <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Why are some images not loading on the website?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
            <p>This could be due to slow internet, browser cache issues, or problems with the image files. Refresh the page, clear your browser cache, and ensure your internet connection is stable. If the problem persists, contact the website support.</p>
        </div>
        </div>
        <div class="accordion-item">
        <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">I forgot my password. How can I reset it?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
            <p>Look for the "Forgot Password" link on the login page. Follow the instructions to reset your password, usually by receiving a reset link via email. If you encounter issues, check your spam folder or contact the website's support for assistance.</p>
        </div>
        </div>
        <div class="accordion-item">
        <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">The website is displaying an error message. What does it mean?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
            <p>Take note of the error message. It could be a temporary issue or a more significant problem. If it's a generic error, try refreshing the page. For specific error messages, search online or contact the website's support with the error details for assistance.</p>
        </div>
        </div>
        <div class="accordion-item">
        <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">I submitted a form, but it's not going through. What should I do?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
            <p> Ensure all required fields are filled correctly. Check for any error messages after submission. If the issue persists, try a different browser. If the problem continues, contact the website administrator or support for guidance.</p>
        </div>
        </div>
    </div>
    </div>
    <script>
        const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
    </script>

<div class="footer">@ 2024 Copyright:<strong><a href="index.php">Economy Finance</a></strong>.</div>