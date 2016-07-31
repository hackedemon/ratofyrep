<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ratofy</title>
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>

	<div class="big_wrapper">
		<header class="top_header">
			<div>
				<h1>Ratofy</h1>
			</div>
			<div class="right">
				<nav class="top_menu">
				<ul>
					<a href="#"><li>Services</li></a>
					<a href="#"><li>People</li></a>
				</ul>
				</nav>
			</div>
		</header>
		
		<section class="main_section">
		
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "ratofycb";
				
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} else {
					$username = $_POST['username'];
					$address = $_POST['password'];
					
					$sql = "SELECT first_name FROM usersbb";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0){
						session_start();
						$_SESSION["name"] = $result;
						echo 'If you are not redirected click <a href="index.php">here</a>';
						Header("HTTP/1.1 301 Moved Permanently");
						Header("Location: index.php");
						exit();
					} else {
						echo "Incorrect username or password";
						echo 'If you are not redirected click <a href="../html/login.html">here</a>';
						Header("HTTP/1.1 301 Moved Permanently");
						Header("Location: ../html/login.html");
						exit();
					}
					$conn->close();
				}
			?>
		</section>

		<footer class="the_footer">
			<nav>
				<ul>
					<a href="#"><li>About Us</li></a>
					<a href="#"><li>Terms of Use</li></a>
					<a href="#"><li>Privacy and Cookies</li></a>
					<a href="#"><li>Advertisers</li></a>
				</ul>
			</nav>
			<p>Copyrights(c) 2016, Ratofy</p>
		</footer>
		
	</div>
</body>
</html>