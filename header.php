<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SolidBook</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>

<header>
	<nav>
	<a href="index.php"><img src="https://i.imgur.com/8E3FWoa.png" width="180px"></a>
			<ul>
			<li><a href="index.php">Home</a></li>
			<?php
				if (isset($_SESSION['username'])) {
					echo "
						<li><a href='profile.php'>My Profile</a></li>
						<form action='search.php' method='POST'>
							<input type='text' name='profile' placeholder='Search...' autocomplete='off'>
							<button>Search</button>
						</form>

						<form action='includes/logout.inc.php'>
							<button>Log Out</button>
						</form>
						";
				} else {
					echo "<form action='includes/login.inc.php' method='post'>
				    <input type='text' name='uid' placeholder='Username' autocomplete='Out'>
				    <input type='password' name='pwd' placeholder='Password'>
				    <button type='submit'>Log In</button>
						</form>
					<li><a href='signup.php'>SIGN UP</a></li>";
				}
			?>
		</ul>
	</nav>
</header>

