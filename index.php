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
        echo "    
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
<figure class='full-width'>
<div id='myCarousel' class='carousel slide' data-ride='carousel'>
	<ol class='carousel-indicators'>
		<li data-target='#myCarousel' data-slide-to='0' class='active'></li>
		<li data-target='#myCarousel' data-slide-to='1'></li>
		<li data-target='#myCarousel' data-slide-to='2'></li>
	</ol>
	<div class='carousel-inner' role='listbox'>
		<div class='item active'>
		<img src='img/mountains.png' style='width:100%;'>
		<div class='carousel-caption'>
			<h1>Start right here</h1>
			<br>
			<form action='#A'>
                            <button class='btn btn-warning'>Sign up</button>
                        </form>
		</div>
		</div> <!---end active -->
		<div class='item'>
			<img src='img/sunset.png' style='width:100%;'>
			<div class='carousel-caption'>
			<h1>Already have an account?</h1>
			<br>
			<form action='#A'>
                            <button class='btn btn-warning'>Login</button>
                        </form>
		</div>
		</div>
		<div class='item' style='width:100%;'>
			<img src='img/pier.png'>
			<div class='carousel-caption'>
			<h1>connect with your friends</h1>
		</div>
		</div>
	</div> <!--end of carousel -->
	<a class='left carousel-control' href='#myCarousel' role='button' data-slide='prev'>
	<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
	<span class='sr-only'>Previous</span>
	</a>
	<a class='right carousel-control' href='#myCarousel' role='button' data-slide='next'>
	<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
	<span class='sr-only'>Next</span>
	</a>
</div>
</figure>
<row>
	<a name='a'></a>
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
    </row>";
    }


    ?>

</div>
<br><br><br><br><br><br><br><br><br>
<?php include 'footer.php'; ?>
</body>
</html>