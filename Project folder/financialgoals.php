<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: login.php");
   }
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Stock Details</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="script.js"></script>
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
		<style>
			:root {
				--gap-size: 32px;
				box-sizing: border-box;
				font-family: -apple-system, BlinkMacSystemFont, 'Trebuchet MS', Roboto,
					Ubuntu, sans-serif;
				color: #fff;
			}

			* {
				box-sizing: border-box;
                color: #fff;
			}
			body{
				background-color: #FFF;
			}
			main {
				color:#fff;
                margin-left: 500px;
				display: grid;
				width: 100%;
				padding: 0 calc(var(--gap-size) * 0.5);
				max-width: 960px;
				grid-template-columns: 1fr 1fr;
				grid-gap: var(--gap-size);
			}

			.span-full-grid,
			#symbol-info,
			#advanced-chart,
			#company-profile,
			#fundamental-data {
				grid-column: span 2;
			}

			.span-one-column,
			#technical-analysis,
			#top-stories,
			#powered-by-tv {
				grid-column: span 1;
			}

			#ticker-tape {
				width: 100%;
				margin-bottom: var(--gap-size);
			}

			#advanced-chart {
				height: 500px;
			}

			#company-profile {
				height:390px;
			}

			#fundamental-data {
				height: 490px;
			}

			#technical-analysis,
			#top-stories {
				height: 425px;
			}

			#powered-by-tv {
				display: flex;
				background: #f8f9fd;
				border: solid 1px #e0e3eb;
				text-align: justify;
				flex-direction: column;
				gap: 8px;
				font-size: 14px;
				padding: 16px;
				border-radius: 6px;
			}

			#powered-by-tv a, #powered-by-tv a:visited {
				color: #2962ff;
			}

			@media (max-width: 800px) {
				main > section,
				.span-full-grid,
				#technical-analysis,
				#top-stories,
				#powered-by-tv {
					grid-column: span 2;
				}
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
			<section id="symbol-info">
			</section>
			<section id="advanced-chart">
			</section>
			<section id="company-profile">
			</section>
			<section id="fundamental-data">
			</section>
			<section id="technical-analysis">
			</section>
			<section id="top-stories">
			</section>
	</body>
	<template id="ticker-tape-widget-template">
		<!-- TradingView Widget BEGIN -->
		<div class="tradingview-widget-container">
			<div class="tradingview-widget-container__widget"></div>
			<script
				type="text/javascript"
				src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
				async
			>
				{
				"symbols": [
				  {
					"description": "",
					"proName": "NASDAQ:TSLA"
				  },
				  {
					"description": "",
					"proName": "NASDAQ:AAPL"
				  },
				  {
					"description": "",
					"proName": "NASDAQ:NVDA"
				  },
				  {
					"description": "",
					"proName": "NASDAQ:MSFT"
				  },
				  {
					"description": "",
					"proName": "NASDAQ:AMZN"
				  },
				  {
					"description": "",
					"proName": "NASDAQ:GOOGL"
				  },
				  {
					"description": "",
					"proName": "NASDAQ:META"
				  },
				  {
					"description": "",
					"proName": "NYSE:BRK.B"
				  },
				  {
					"description": "",
					"proName": "NYSE:LLY"
				  },
				  {
					"description": "",
					"proName": "NYSE:UNH"
				  },
				  {
					"description": "",
					"proName": "NYSE:V"
				  },
				  {
					"description": "",
					"proName": "NYSE:WMT"
				  }
				],
				"showSymbolLogo": true,
				"colorTheme": "light",
				"isTransparent": false,
				"displayMode": "adaptive",
				"locale": "en",
				"largeChartUrl": "#"
				 }
			</script>
		</div>
		<!-- TradingView Widget END -->
	</template>
	<template id="symbol-info-template">
		<!-- TradingView Widget BEGIN -->
		<div class="tradingview-widget-container">
			<div class="tradingview-widget-container__widget"></div>
			<script
				type="text/javascript"
				src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-info.js"
				async
			>
				{
				"symbol": "NASDAQ:AAPL",
				"width": "100%",
				"locale": "en",
				"colorTheme": "light",
				"isTransparent": true
				 }
			</script>
		</div>
		<!-- TradingView Widget END -->
	</template>
	<script
				type="text/javascript"
				src="https://s3.tradingview.com/tv.js"
			></script>
	<template id="advanced-chart-template">
		<!-- TradingView Widget BEGIN -->
		<div
			class="tradingview-widget-container"
			style="height: 100%; width: 100%"
		>
			<div
				id="tradingview_ae7da"
				style="height: calc(100% - 32px); width: 100%"
			></div>

			<script type="text/javascript">
				new TradingView.widget({
					autosize: true,
					symbol: 'NASDAQ:AAPL',
					interval: 'D',
					timezone: 'Etc/UTC',
					theme: 'light',
					style: '1',
					locale: 'en',
					enable_publishing: false,
					hide_side_toolbar: false,
					allow_symbol_change: true,
					studies: ['STD;MACD'],
					container_id: 'tradingview_ae7da',
				});
			</script>
		</div>
		<!-- TradingView Widget END -->
	</template>
	<template id="company-profile-template">
		<!-- TradingView Widget BEGIN -->
		<div class="tradingview-widget-container">
			<div class="tradingview-widget-container__widget"></div>
			<script
				type="text/javascript"
				src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-profile.js"
				async
			>
				  {
				  "width": "100%",
				  "height": "100%",
				  "colorTheme": "light",
				  "isTransparent": true,
				  "symbol": "NASDAQ:AAPL",
				  "locale": "en"
				}
			</script>
		</div>
		<!-- TradingView Widget END -->
	</template>
	<template id="fundamental-data-template">
		<!-- TradingView Widget BEGIN -->
		<div class="tradingview-widget-container">
			<div class="tradingview-widget-container__widget"></div>
			<script
				type="text/javascript"
				src="https://s3.tradingview.com/external-embedding/embed-widget-financials.js"
				async
			>
				  {
				  "colorTheme": "light",
				  "isTransparent": true,
				  "largeChartUrl": "",
				  "displayMode": "adaptive",
				  "width": "100%",
				  "height": "100%",
				  "symbol": "NASDAQ:AAPL",
				  "locale": "en"
				}
			</script>
		</div>
		<!-- TradingView Widget END -->
	</template>
	<template id="technical-analysis-template">
		<!-- TradingView Widget BEGIN -->
		<div class="tradingview-widget-container">
			<div class="tradingview-widget-container__widget"></div>
			<script
				type="text/javascript"
				src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js"
				async
			>
				{
				"interval": "15m",
				"width": "100%",
				"isTransparent": true,
				"height": "100%",
				"symbol": "NASDAQ:AAPL",
				"showIntervalTabs": true,
				"displayMode": "single",
				"locale": "en",
				"colorTheme": "light"
				 }
			</script>
		</div>
		<!-- TradingView Widget END -->
	</template>
	<template id="top-stories-template">
		<!-- TradingView Widget BEGIN -->
		<div class="tradingview-widget-container">
			<div class="tradingview-widget-container__widget"></div>
			<script
				type="text/javascript"
				src="https://s3.tradingview.com/external-embedding/embed-widget-timeline.js"
				async
			>
				  {
				  "feedMode": "symbol",
				  "symbol": "NASDAQ:AAPL",
				  "colorTheme": "light",
				  "isTransparent": true,
				  "displayMode": "regular",
				  "width": "100%",
				  "height": "100%",
				  "locale": "en"
				}
			</script>
		</div>
		<!-- TradingView Widget END -->
	</template>
	<script>
		function getQueryParam(param) {
			let urlSearchParams = new URLSearchParams(window.location.search);
			return urlSearchParams.get(param);
		}
		function readSymbolFromQueryString() {
			return getQueryParam('tvwidgetsymbol');
		}

		function cloneTemplateInto(templateId, targetId, rewrites) {
			const tmpl = document.querySelector(`#${templateId}`);
			if (!tmpl) return;
			const target = document.querySelector(`#${targetId}`);
			if (!target) return;
			target.innerText = '';
			const clone = tmpl.content.cloneNode(true);
			if (rewrites) {
				const script = clone.querySelector('script');
				script.textContent = rewrites(script.textContent);
			}
			target.appendChild(clone);
		}
		function currentPage() {
			const l = document.location;
			if (!l) return;
			if (l.origin && l.pathname) return l.origin + l.pathname;
			return l.href;
		}
		cloneTemplateInto('ticker-tape-widget-template', 'ticker-tape', function(scriptContent) {
			const currentPageUrl = currentPage();
			if (!currentPageUrl) return scriptContent;
			return scriptContent.replace('"largeChartUrl": "#"', `"largeChartUrl": "${currentPageUrl}"`)
		});
		const symbol = readSymbolFromQueryString() || 'NASDAQ:AAPL';
		function setSymbol(scriptContent) {
			return scriptContent.replace(/"symbol": "([^"]*)"/g, () => {
				return `"symbol": "${symbol}"`;
			});
		}
		cloneTemplateInto('symbol-info-template', 'symbol-info', setSymbol);
		cloneTemplateInto('advanced-chart-template', 'advanced-chart');
		cloneTemplateInto('company-profile-template', 'company-profile', setSymbol);
		cloneTemplateInto('fundamental-data-template', 'fundamental-data', setSymbol);
		cloneTemplateInto('technical-analysis-template', 'technical-analysis', setSymbol);
		cloneTemplateInto('top-stories-template', 'top-stories', setSymbol);
		if (symbol) {
			document.title = `Stock Details - ${symbol}`;
		}
	</script>
	
</html>
