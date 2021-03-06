<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Ratofy</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/index.css">
	<script type="text/javascript">
	function validateForm(){
		if(document.forms["inputform"]["fname"].value == null){
			alert("Please enter Name to be rated");
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
				Welcome <?php
					session_start();
					$name = $_SESSION["name"];
					echo "$name";
				?>
			</div>
			<div class="right">
				<nav class="top_menu">
				<ul>
					<a href="#"><li>Services</li></a>
					<a href="#"><li>People</li></a>
					<a href="#"><li>Products</li></a>
				</ul>
				</nav>
			</div>
		</header>
		
		<section class="main_section">
			<form method="post" action="action.php" name="inputform" onSubmit="return validateForm()">
				<p>
				<div class="tooltip">
				<input type="text" class="textbox" name="fname" placeholder="Name to be rated">
				<span class="tooltiptext">Eg. Service, People, Products etc</span>
				</div>
				</p>
				<p>
				<div class="tooltip">
				<input type="text" class="textbox" name="location" placeholder="Location of name to be rated ">
				<span class="tooltiptext">Eg. City, State or Country</span>
				</div>
				</p>
				<p><input class="button" type="submit" name="rate" value="Rate">
				<input class="button" type="submit" name="search" value="Search"></p>
			</form>
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