<?php
include 'dbh.php';

function setTweets($conn) {
    if (isset($_POST['tweetSubmit'])) {
        $uid = $_POST['uid'];
        $tweet = $_POST['tweet'];
        $sql = "INSERT INTO solidbook_tweets (uid, message) 
		VALUES ('$uid', '$tweet')";

        mysqli_query($conn, $sql);
        echo mysqli_error($conn);
    }
}

function deleteTweets($conn, $tweet) {
    if (isset($_POST['tweetSubmit'])) {
        $sql = "DELETE FROM solidbook_tweets WHERE message='" . $tweet . "'";

        mysqli_query($conn, $sql);
        echo mysqli_error($conn);
        echo "<meta http-equiv='refresh' content='0'>";

    }
}

function getTweets($conn) {
        $sql = "SELECT * FROM solidbook_tweets ORDER BY date desc";
        $result = mysqli_query($conn, $sql);
        echo "<table class='table'>";
        while ($row = mysqli_fetch_assoc($result)) {
            $uid = $row['uid'];
            $sql1 = "SELECT * FROM solidbook_users WHERE username='".$uid."'";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            echo"<tr>
                <th style='width: 100px'><img src='".$row1['picurl']."' height='100' width='100'></th>
                <th style='width: 600px'><table width='100%'><tr><th>".$row['uid']."</th><th style='float:right;'> ".$row['date']."</th></tr></table>
                
                <table style='margin-top: 5px;'><tr><th>".$row['message']."</th></tr></table></th>
                </tr>";
        }echo "</table>";
}