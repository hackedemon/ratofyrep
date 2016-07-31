<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ratofy</title>
	<link rel="stylesheet" href="../css/main.css">
	<script type="text/javascript">
	function validateForm(){
		if(document.forms["inputform"]["contact"].value == "" || document.forms["inputform"]["contact"].value == null){
			if(document.forms["inputform"]["email"].value == "" || document.forms["inputform"]["email"].value == null){
				alert("Please enter Email or Contact of Name to be rated");
				return false;
			}
		}
	}
	</script>
</head>
<body>

	<div class="big_wrapper">
		<header class="top_header">
			<div>
				<h1>Ratofy</h1>
			</div>
			<div class="right">
				<a href="#"><h2>Login/SignUp</h2></a>
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
				$servername = "mysql12.000webhost.com";
				$username = "a3647184_cb29690";
				$password = "cherish7300";
				$dbname = "a3647184_ratecb";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} else {
					//echo "Connection Successful<br>";
				}
				
				if(isset($_POST['rate'])){
					$fname = $_POST['fname'];
					$address = $_POST['location'];
					//$sql = "INSERT INTO ratinfo (email, contact) VALUES ('$fname', '$address')";
					//if ($conn->query($sql)){
					echo '	<form method="post" action="#" name="inputform" onSubmit="return validateForm()">
								<p>
									<div class="tooltip">
										<input type="text" class="textbox" name="email" placeholder="Email">
										<span class="tooltiptext">Eg. abcd@gmail.com</span>
									</div>
								</p>
								<p>
									<div class="tooltip">
										<input type="text" class="textbox" name="contact" placeholder="Contact Number">
										<span class="tooltiptext">Only 10 digit number Eg. 9876543210, 2223456789</span>
									</div>
								</p>
								<p>
									<input class="button" type="submit" name="rate1" value="1 star">
									<input class="button" type="submit" name="rate2" value="2 star">
									<input class="button" type="submit" name="rate3" value="3 star">
									<input class="button" type="submit" name="rate4" value="4 star">
									<input class="button" type="submit" name="rate5" value="5 star">
								</p>
							</form>';
							
					$sql = "INSERT INTO ratinfo (email, contact) VALUES ('$fname', '$address')";
					if ($conn->query($sql)){
						echo 'Record successfully added';
					} else {
						echo 'Error Inserting Record';
					}
					$conn->close();
				} else if (isset($_POST['search'])){
					$fname = $_POST['fname'];
					$address = $_POST['location'];
					$sql = "SELECT * FROM ratinfo WHERE name like '%$fname%' AND location like '%$address%'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						// echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["location"]. " " . $row["email"] . " " . $row["contact"] . "<br>";
						echo "Name: " . $row["name"]. " -Location:" . $row["location"]. " " . $row["email"] . " " . $row["contact"] . "<br>";
					}
					} else {
						echo "No results";
					}
					$conn->close();
				} else if (isset($_POST['rate1']) || isset($_POST['rate2']) || isset($_POST['rate3']) || isset($_POST['rate4']) || isset($_POST['rate5'])) {
					//echo "record inserted successfully";
					$sql = "INSERT INTO ratinfo (email, contact) VALUES ('$fname', '$address')";
					if ($conn->query($sql)){
						echo 'Record successfully added';
					} else {
						echo 'Error Inserting Record';
					}
					$conn->close();
				} else {
					$conn->close();
					exit ("Invalid Action");
				}
			?>
<!--
			Welcome <?php echo $_POST["fname"]; ?><br>
			<?php 
				$loc = $_POST["location"];
				if ($loc != null && $loc != ""){
					echo "Location entered is: ", $_POST["location"];
				}
			?>
-->
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