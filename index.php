<html>
<body>
<?php
include 'header.php';
include 'tweets.php';
include 'dbh.php';

date_default_timezone_set('Europe/Helsinki');
?>
<div class="container text-center">

    <?php
    if (isset($_SESSION['username'])) {
        echo "    <div class=\"container\">
                        <div class='row'>
                            <div class='col-sm-4'>
                            <h1>Welcome, ".$_SESSION['username']."!</h1>
                                <div class='form-group'>
                                    <form method='post' action='".setTweets($conn)."'>
                                    <input type='hidden' name='uid' value='".$_SESSION['username']."'>
                                    <textarea class=\"form-control\" rows=\"5\" name='tweet'></textarea><br>
                                    <button type='submit' name='tweetSubmit' class='btn btn-success'>Tweet</button>
                                    </form>
                                </div>
                            </div>
                            <div class='col-sm-8'>";

                            $sql = "SELECT * FROM solidbook_tweets ORDER BY date desc";
                            $result = mysqli_query($conn, $sql);
                            echo "<table class='table' style=\"background-color:rgba(255, 255, 255, 0.7);\">";
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
                            }echo "</table>
                                    </div>
                                    </div>
                                    </div>";
    } else {
        echo "<div class='container'>
<br><br><br><br><br><br><br>
<row>
    <div id='loginbox' style='margin-top:50px;' class='col-sm-6'>
        <div class='panel panel-info' >
            <div class='panel-heading'>
                <div class='panel-title'>Sign In</div>
            </div>

            <div style='padding-top:30px' class='panel-body' >

                <div style='display:none' id='login-alert' class='alert alert-danger col-sm-12'></div>

                <form id='loginform' class='form-horizontal' role='form' action='includes/login.inc.php' method='post'>

                    <div style='margin-bottom: 25px' class='input-group'>
                        <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
                        <input id='login-username' type='text' class='form-control' name='uid' value='' placeholder='username'>
                    </div>

                    <div style='margin-bottom: 25px' class='input-group'>
                        <span class='input-group-addon'><i class='glyphicon glyphicon-lock'></i></span>
                        <input id='login-password' type='password' class='form-control' name='pwd' placeholder='password'>
                    </div>

                    <div style='margin-top:10px' class='form-group'>
                        <!-- Button -->

                        <div class='col-sm-12 controls'>
                            <button type='submit' class='btn btn-success'>Log In</button>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>
    <div id='signupbox' style='margin-top:50px;' class='col-sm-6'>
        <div class='panel panel-info' >
            <div class='panel-heading'>
                <div class='panel-title'>Sign Up</div>
            </div>

            <div style='padding-top:30px' class='panel-body' >

                <div style='display:none' id='login-alert' class='alert alert-danger col-sm-12'></div>

                <form id='loginform' class='form-horizontal' role='form' action='includes/signup.inc.php' method='post'>

                    <div style='margin-bottom: 25px' class='input-group'>
                        <span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span>
                        <input id='email' type='text' class='form-control' name='email' value='' placeholder='e-mail'>
                    </div>
                    
                    <div style='margin-bottom: 25px' class='input-group'>
                        <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
                        <input id='signup-username' type='text' class='form-control' name='uid' value='' placeholder='username'>
                    </div>

                    <div style='margin-bottom: 25px' class='input-group'>
                        <span class='input-group-addon'><i class='glyphicon glyphicon-lock'></i></span>
                        <input id='signup-password' type='password' class='form-control' name='pwd' placeholder='password'>
                    </div>

                    <div style='margin-top:10px' class='form-group'>
                        <!-- Button -->

                        <div class='col-sm-12 controls'>
                            <button type='submit' class='btn btn-success'>Sign Up</button>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>
    </row>
</div>";
    }

    ?>

</div>
<br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>
</body>
</html>