<html>
<body>
<?php
include 'header.php';
include 'tweets.php';
include 'dbh.php';
$profile = $_SESSION['username'];

date_default_timezone_set('Europe/Helsinki');
?>
<div class="container text-center">

    <?php
    $sql = "SELECT * FROM solidbook_users WHERE username='".$profile."'";
    $result = mysqli_query($conn, $sql);
    echo mysqli_error($conn);

    $sql1 = "SELECT * FROM solidbook_tweets WHERE uid='".$profile."'";
    $result1 = mysqli_query($conn, $sql1);
    echo mysqli_error($conn);

    $sql2 = "SELECT COUNT(*) as total FROM solidbook_tweets WHERE uid='".$profile."'";
    $result2 = mysqli_query($conn, $sql2);
    echo mysqli_error($conn);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($row2 = mysqli_fetch_assoc($result2)) {
        echo "<div class='container'>
                        <div class='row'>
                            <div class='col-sm-4'>
                                <div class='imgdiv'><img src='". $row['picurl'] ."' height='240' width='240'></div><div class='h1div'><h1>User ". $profile." <br> Total Tweets: ".$row2['total']."</h1></div><br>
                            </div>";
        }
        echo "<div class='col-sm-8'>";
        echo "<table class='table' style='background-color:rgba(255, 255, 255, 0.7);'>";
        while($row1 = mysqli_fetch_assoc($result1)) {
            echo"<tr>
                 <th style='width: 100px'><img src='".$row['picurl']."' height='100' width='100'></th>
                 <th style='width: 600px'><table width='100%'><tr><th>".$row1['uid']."</th><th style='float:right;'> ".$row1['date']."</th></tr></table>
                 <table style='margin-top: 5px;'><tr><th>".$row1['message']."</th></tr></table></th>
                 </tr>";
        } echo "</table></div>
                                    </div>
                                    </div>";
    }

    ?>
</div>
<br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>
</body>
</html>