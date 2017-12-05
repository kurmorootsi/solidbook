<?php
	include 'header.php';
?>

<?php
	if (isset($_SESSION['username'])) {
		echo "You are already logged in";
	} else {
		echo "<form action='includes/signup.inc.php' method='post'>
    		<input type='text' name='fullname' placeholder='Full name'><br>
			    <input type='text' name='uid' placeholder='Username'><br>
			    <input type='password' name='pwd' placeholder='Password'><br>
			    <button type='submit'>Sign up</button>
			</form>";
	}
?>

<br><br><br>


</body>
</html>