<?php
session_start();

include '../dbh.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM solidbook_users WHERE username='$uid' AND password='$pwd'";
$result = mysqli_query($conn, $sql);
echo mysqli_error($conn);

if (!$row = mysqli_fetch_assoc($result)) {
	echo "Your username or password is incorrect!";
} else {
	$_SESSION['username'] = $row['username'];
}


header("Location: ../index.php");