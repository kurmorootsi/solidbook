<?php
	include 'header.php';
	include 'tweets.php';
	include 'dbh.php';
	date_default_timezone_set('Europe/Helsinki');
?>

<?php
	if (isset($_SESSION['username'])) {
		echo "<div class='mainpage'>";
		echo "<div class='tweet-box-write'>";
		echo "<h1>Welcome, ".$_SESSION['username']."!</h1>";
		echo "<form method='post' action='".setTweets($conn)."'>
			<input type='hidden' name='uid' value='".$_SESSION['username']."'>
			<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
			<textarea name='tweet'></textarea><br>
			<button type='submit' name='tweetSubmit'>Tweet</button>
			</form></div></div>";
			getTweets($conn);
	} else {
		echo "<form action='includes/signup.inc.php' method='post'>
		<div class='signupform'>
    		<input type='text' name='fullname' placeholder='Full name'><br>
			    <input type='text' name='uid' placeholder='Username'><br>
			    <input type='password' name='pwd' placeholder='Password'><br>
			    <button type='submit'>Sign up</button>
			</div></form>";
	}
?>

</body>
</html>