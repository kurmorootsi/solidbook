<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SolidBook</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
            background-color: #5E4485;
            color: #ffffff;
            padding: 1% 0;
            font-size: 1.2em;
            border: 0;
        }
        .navbar-brand {
            float:left;
            min-height: 55px;
            padding: 0 15px 5px;
        }
        .navbar-inverse .navbar-nav .active a, .navbar-inverse .navbar-nav .active a:focus, .navbar-inverse .navbar-nav .active a:hover {
            color: #FFF;
            background-color: #5E4485;
        }
        .carousel-caption {
            top: 50%;
            transform: translateY(-50%);
            text-transform: uppercase;
        }
        .btn {
            font-size: 18px;
            color: #ffffff;
            padding: 12px 22px;
            background-color: #5E4485;
            border: 2px solid #FFF;
        }
        #icon {
            max-width: 200px;
            margin: 1% auto;
        }

        footer {
            width: 100%;
            background-color: #5E4485;
            padding: 5%;
            color: #FFF;
        }
        .fa {
            padding: 15px;
            font-size: 25px;
            color: #FFF;
        }
        .fa:hover {
            color: #D5D5D5;
            text-decoration: none;
        }
        @media (max-width: 900px) {
            .fa {
                font-size: 20px;
                padding: 10px;
            }
        }
        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
            }
            #icon {
                max-width: 150px;
            }
        }

    </style>
</head>

<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a class="navbar-brand" href="#"><img src="img/w3newbie.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Home</a></li>
                    <form action='includes/login.inc.php' method='post'>
                        <input type='text' name='uid' placeholder='Username' autocomplete='Out'>
                        <input type='password' name='pwd' placeholder='Password'>
                        <button type='submit'>Log In</button>
                    </form>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

            </div>
        </div>
    </nav>

	<nav>
	<a href="index.php"><img src="https://i.imgur.com/8E3FWoa.png" width="180px"></a>
			<ul>
			<li><a href="index.php">Home</a></li>
			<?php
				if (isset($_SESSION['username'])) {
					echo "
						<li><a href='profile.php'>My Profile</a></li>
						<form action='search.php' method='POST'>
							<input type='text' name='profile' placeholder='Search...' autocomplete='off'>
							<button>Search...</button>
						</form>

						<form action='includes/logout.inc.php'>
							<button>Log Out</button>
						</form>
						";
				} else {
					echo "<form action='includes/login.inc.php' method='post'>
				    <input type='text' name='uid' placeholder='Username' autocomplete='Out'>
				    <input type='password' name='pwd' placeholder='Password'>
				    <button type='submit'>Log In</button>
						</form>
					<li><a href='signup.php'>SIGN UP</a></li>";
				}
			?>
		</ul>
	</nav>
</header>

