<?php

$conn = mysqli_connect("localhost","if17","if17","if17_rootkurm");
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}