<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ratofy</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/action.css">
	<script type="text/javascript">
	function validateForm(){
		if(document.forms["inputform"]["contact"].value == "" || document.forms["inputform"]["contact"].value == null){
			if(document.forms["inputform"]["email"].value == "" || document.forms["inputform"]["email"].value == null){
				alert("Please enter Email or Contact of Name to be rated");
				return false;
			}
		}else if(document.forms["inputform"]["contact"].value.length != 10){
			alert("Contact number should only be of 10 digits!");
			return false;
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
					if(isset($_POST['rate'])){
					echo '	<form method="post" action="rate.php" name="inputform" onSubmit="return validateForm()">
								<p>
									<div class="tooltip">
										<input type="text" class="textbox" name="email" placeholder="Email">
										<span class="tooltiptext">Eg. abcd@gmail.com</span>
									</div>
								</p>
								<p>
									<div class="tooltip">
										<input type="text" maxlength="10" class="textbox" name="contact" placeholder="Contact Number">
										<span class="tooltiptext">Only 10 digit number Eg. 9876543210, 2223456789</span>
									</div>
								</p>
								<input type="hidden" name="fname" value=' . $_POST["fname"] . '>
								<input type="hidden" name="address" value=' . $_POST["location"] . '>
								<p>
									<input class="button" type="submit" name="rate1">
									<input class="button" type="submit" name="rate2">
									<input class="button" type="submit" name="rate3">
									<input class="button" type="submit" name="rate4">
									<input class="button" type="submit" name="rate5">
								</p>
							</form>';
					} else if (isset($_POST['search'])){
						$fname = $_POST['fname'];
						$address = $_POST['location'];
						$sql = "SELECT * FROM ratinfo WHERE name like '%$fname%' AND location like '%$address%' AND email like '%' AND contact like '%'";
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
					} else {
						$conn->close();
						exit ("Invalid Action");
					}
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