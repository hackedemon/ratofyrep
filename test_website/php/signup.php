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
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
					$contact = $_POST['contact'];					
					$username = $_POST['email'];
					$address = $_POST['password'];
					
					$sql = "INSERT INTO `usersbb`(`First_Name`, `Last_Name`, `username`, `password`) VALUES ('$firstname','$lastname','$username','$address')";

					if ($conn->query($sql)){
						//$result = $conn->query($sql);
						session_start();
						$_SESSION["name"] = $firstname;
						//$result->num_rows;
						//while($row = $result->fetch_assoc()) {
							//$_SESSION["name"] = $row["First_Name"];
						//}
						echo 'If you are not redirected click <a href="index.php">here</a>';
						Header("HTTP/1.1 301 Moved Permanently");
						Header("Location: index.php");
						exit();
					} else {
						//echo "$conn->query($sql)";
						echo "Error Inserting Record";
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