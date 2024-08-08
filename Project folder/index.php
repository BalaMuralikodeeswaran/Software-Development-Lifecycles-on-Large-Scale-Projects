<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');
    body{
      background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRE3pxbjJ0ktpcU-2mWskP5kPdGmARUcIWuug&usqp=CAU');
    }
    /* CSS for main element */
    .intro {
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 520px;
      margin-left: 150px;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      /* Add the following line to set the background image */
    }

    .intro h1 {
      font-family: sans-serif;
      font-size: 40px;
      color: #fff;
      font-weight: bold;
      text-transform: uppercase;
      margin: 0;
      
    }

    .intro p {
      font-size: 20px;
      color: #fff;
      text-transform: uppercase;
      margin: 20px 0;
    }

    .intro button {
      background-color: #F39422;
      color:#fff;
      padding: 10px 25px;
      border: none;
      border-radius: 5px;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4)
    }
  </style>
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
            <li><a href="convertor.php">Currencies Convertor</a></li>
            <li><a href="calculator.php">calculator</a></li>
            <li><a href="table.php">t</a></li>
            <li><a>Contact</a></li>
            <li><a>Contact</a></li>
            <li><a>Contact</a></li>
            <li><a>Contact</a></li>
            <li><a>Contact</a></li>
            <li><a>Contact</a></li>
        </ul>
       </nav>
    <div class="logo">
        <p><a href="home.php">Economy Finances</a> </p>
    </div>

    <div class="right-links">
      <a href="login.php"> <button class="btn">LogIn</button> </a>
    </div>
</div>
<main>
    <div class="intro">
      <h1>At Economy Finances, we provide you with the latest updates and insights to navigate the world of finance and economics with confidence.</h1>
      <p>Start Your Journey Towards Financial Wellness Today!</p>
      <button>LogIn</button>
    </div>
    <div class="footer">@ 2024 Copyright:<strong><a href="index.php">Economy Finance</a></strong>.
</body>
</html>
