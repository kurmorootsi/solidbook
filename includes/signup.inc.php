<?php
session_start();

include '../dbh.php';

$uid = $_POST['uid'];
$first = $_POST['fullname'];
$pwd = $_POST['pwd'];

$sql = "INSERT INTO solidbook_users (username, fullname, password)
VALUES ('$uid', '$first', '$pwd')";
$result = mysqli_query($conn, $sql);

header("Location: ../index.php");