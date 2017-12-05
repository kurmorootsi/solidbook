<?php
include 'header.php';
include 'dbh.php';

$profile = $_SESSION['username'];



$sql = "SELECT * FROM solidbook_users WHERE username='$profile'";
$result = mysqli_query($conn, $sql);
echo mysqli_error($conn);

$sql1 = "SELECT * FROM solidbook_tweets WHERE uid='$profile'";
$result1 = mysqli_query($conn, $sql1);
echo mysqli_error($conn);

if ($row = mysqli_fetch_assoc($result)) {
	echo "<div class='imgdiv'><img src='". $row['picurl'] ."' height='240' width='240'></div><div class='h1div'><h1> User ". $profile.'</h1></div><br>';
	while($row1 = mysqli_fetch_assoc($result1)) {
		echo "<div class='tweet-box-profile'><p>";
			echo $row1['uid']."<br>";
			echo $row1['date']."<br><br>";
			echo $row1['message'];
		echo "</p></div>";
	}	
	}
	else {
		echo "Midagi läks valesti!";
	}

?>

</body>
</html>