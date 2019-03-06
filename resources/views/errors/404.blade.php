<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Nothing was found</title>

	<link href="https://fonts.googleapis.com/css?family=Kanit:200" rel="stylesheet">


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<style>
		* {
			-webkit-box-sizing: border-box;
			box-sizing: border-box;
		}

		body {
			padding: 0;
			margin: 0;
		}

		#error {
			position: relative;
			height: 100vh;
		}

		#error .error {
			position: absolute;
			left: 50%;
			top: 50%;
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}

		.error {
			max-width: 767px;
			width: 100%;
			line-height: 1.4;
			text-align: center;
			padding: 15px;
		}

		.error .error-code {
			position: relative;
			height: 220px;
		}

		.error .error-code h1 {
			font-family: 'Kanit', sans-serif;
			position: absolute;
			left: 50%;
			top: 50%;
			-webkit-transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
			font-size: 186px;
			font-weight: 200;
			margin: 0px;
			background: linear-gradient(130deg, #ffa34f, #ff6f68);
			color: transparent;
			-webkit-background-clip: text;
			background-clip: text;
			text-transform: uppercase;
		}

		.error h2 {
			font-family: 'Kanit', sans-serif;
			font-size: 33px;
			font-weight: 200;
			text-transform: uppercase;
			margin-top: 0px;
			margin-bottom: 25px;
			letter-spacing: 3px;
		}


		.error p {
			font-family: 'Kanit', sans-serif;
			font-size: 16px;
			font-weight: 200;
			margin-top: 0px;
			margin-bottom: 25px;
		}


		.error a {
			font-family: 'Kanit', sans-serif;
			color: #ff6f68;
			font-weight: 200;
			text-decoration: none;
			border-bottom: 1px dashed #ff6f68;
			border-radius: 2px;
		}

		.error-social>a {
			display: inline-block;
			height: 40px;
			line-height: 40px;
			width: 40px;
			font-size: 14px;
			color: #ff6f68;
			border: 1px solid #efefef;
			border-radius: 50%;
			margin: 3px;
			-webkit-transition: 0.2s all;
			transition: 0.2s all;
		}

		.error-social>a:hover {
			color: #fff;
			background-color: #ff6f68;
			border-color: #ff6f68;
		}

		@media only screen and (max-width: 480px) {
			.error .error-code {
				position: relative;
				height: 168px;
			}

			.error .error-code h1 {
				font-size: 142px;
			}

			.error h2 {
				font-size: 22px;
			}
		}
	</style>
</head>

<body>

	<div id="error">
		<div class="error">
			<div class="error-code">
				<h1>404</h1>
			</div>
			<h2>Nothing was found</h2>
			<p><a href="/">Return to homepage</a></p>
		</div>
	</div>

</body>

</html>