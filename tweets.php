<?php
include 'dbh.php';

function setTweets($conn) {
	if (isset($_POST['tweetSubmit'])) {
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$tweet = $_POST['tweet'];
		$sql = "INSERT INTO solidbook_tweets (uid, date, message) 
		VALUES ('$uid', '$date', '$tweet')";

		$result = mysqli_query($conn, $sql);
	}
}

function getTweets($conn) {
	$sql = "SELECT * FROM solidbook_tweets ORDER BY date desc";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
	$sql1 = "SELECT * FROM solidbook_users WHERE username='".$row['uid']."'";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_assoc($result1);
		echo "<div class='tweet-box'><p>";
		echo "<div class='imgdivtweet'><img src='". $row1['picurl'] ."' height='100' width='100'></div>";
		echo $row['uid']."<br>";
		echo $row['date']."<br><br>";
		echo $row['message'];
		echo "</p></div>";
	}
}