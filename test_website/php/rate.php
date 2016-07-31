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
					$fname = $_POST['fname'];
					$address = $_POST['address'];
					$email = $_POST['email'];
					$contact = $_POST['contact'];
					
					if($_POST['email'] == null){
						//echo 'null email found';
						$sql = "INSERT INTO ratinfo (name, location, email) VALUES ('$fname', '$address', '$email')";
					}else if($_POST['contact'] == null){
						//echo 'null contact found';
						$sql = "INSERT INTO ratinfo (name, location, contact) VALUES ('$fname', '$address', '$contact')";
					}else{
						$sql = "INSERT INTO ratinfo (name, location, email, contact) VALUES ('$fname', '$address', '$email', '$contact')";
					}
						
					if ($conn->query($sql)){
						echo 'Record successfully added';
					} else {
						//echo 'Error inserting record';
						$sql = "SELECT name FROM ratinfo where email = '$email' or contact = '$contact'";
						$result = $conn->query($sql);
						while($row = $result->fetch_assoc()) {
							echo "Can't rate your entered product/service same email address or contact already exists <br>";
							echo "Did you meant any one of these: <br>";
							echo "Name: " . $row["name"] . "<br>";
						}
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