<?php
    session_start();


    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    include("php/config.php");


    if (!isset($_SESSION['valid'])) {
        header("Location: login.php");
    }

    $conn = new mysqli("localhost","root","","tutorial");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/convertor.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <title>Currency Converter</title>
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
<div class="wrapper">
      <header>Currency Converter</header>
      <form action="#">
        <div class="amount">
          <p>Enter Amount</p>
          <input type="text" value="1">
        </div>
        <div class="drop-list">
          <div class="from">
            <p>From</p>
            <div class="select-box">
              <img src="https://flagcdn.com/48x36/us.png" alt="flag">
              <select> <!-- Options tag are inserted from JavaScript --> </select>
            </div>
          </div>
          <div class="icon"><i class="fas fa-exchange-alt"></i></div>
          <div class="to">
            <p>To</p>
            <div class="select-box">
              <img src="https://flagcdn.com/48x36/np.png" alt="flag">
              <select> <!-- Options tag are inserted from JavaScript --> </select>
            </div>
          </div>
        </div>
        <div class="exchange-rate">Getting exchange rate...</div>
        <button>Get Exchange Rate</button>
      </form>
    </div>
    <div class="footer">@ 2024 Copyright:<strong><a href="index.php">Economy Finance</a></strong>.</div>
    <script>
        let country_list = {
    "GBP": "GB",
    "USD": "US",
    "EUR": "FR",
    "BRL": "BR",
    "JPY": "JP",
    "TRY": "TR"
};

const dropList = document.querySelectorAll("form select"),
    fromCurrency = document.querySelector(".from select"),
    toCurrency = document.querySelector(".to select"),
    getButton = document.querySelector("form button");

// Clear existing options
for (let i = 0; i < dropList.length; i++) {
    dropList[i].innerHTML = '';
}

// Populate dropdown menus with selected currencies
for (let i = 0; i < dropList.length; i++) {
    for (let currency_code in country_list) {
        let selected = i === 0 && currency_code === "USD" ? "selected" : ""; // Set default selection
        let optionTag = `<option value="${currency_code}" ${selected}>${currency_code}</option>`;
        dropList[i].insertAdjacentHTML("beforeend", optionTag);
    }
    dropList[i].addEventListener("change", (e) => {
        loadFlag(e.target);
    });
}

function loadFlag(element) {
    for (let code in country_list) {
        if (code === element.value) {
            let imgTag = element.parentElement.querySelector("img");
            imgTag.src = `https://flagcdn.com/48x36/${country_list[code].toLowerCase()}.png`;
        }
    }
}

window.addEventListener("load", () => {
    getExchangeRate();
});

getButton.addEventListener("click", (e) => {
    e.preventDefault();
    getExchangeRate();
});

const exchangeIcon = document.querySelector("form .icon");
exchangeIcon.addEventListener("click", () => {
    let tempCode = fromCurrency.value;
    fromCurrency.value = toCurrency.value;
    toCurrency.value = tempCode;
    loadFlag(fromCurrency);
    loadFlag(toCurrency);
    getExchangeRate();
});

function getExchangeRate() {
    const amount = document.querySelector("form input");
    const exchangeRateTxt = document.querySelector("form .exchange-rate");
    let amountVal = amount.value;
    if (amountVal === "" || amountVal === "0") {
        amount.value = "1";
        amountVal = 1;
    }
    exchangeRateTxt.innerText = "Getting exchange rate...";
    let url = `https://v6.exchangerate-api.com/v6/806502e1300f21e45f120893/latest/${fromCurrency.value}`;
    fetch(url)
        .then((response) => response.json())
        .then((result) => {
            let exchangeRate = result.conversion_rates[toCurrency.value];
            let totalExRate = (amountVal * exchangeRate).toFixed(2);
            exchangeRateTxt.innerText = `${amountVal} ${fromCurrency.value} = ${totalExRate} ${toCurrency.value}`;
        })
        .catch(() => {
            exchangeRateTxt.innerText = "Something went wrong";
        });
}

    </script>
</body>
</html>
