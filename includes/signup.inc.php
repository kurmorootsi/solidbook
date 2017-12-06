<?php
session_start();

include '../dbh.php';

$uid = $_POST['uid'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$sql = "INSERT INTO solidbook_users (username, email, password)
VALUES ('$uid', '$email', '$pwd')";
$result = mysqli_query($conn, $sql);
echo mysqli_error($conn);

header("Location: ../index.php");