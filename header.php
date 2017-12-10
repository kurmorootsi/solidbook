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
        body{
            background-image: url("https://i.imgur.com/G1Bw3FV.png");
            background-repeat: repeat;
            background-color: #ddd;
        }
        input {
            color: #000;
        }
        ul {
            padding-top: 10px;
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
			color: #FFF;
			padding: 12px 22px;
			background: #5E44B5;
			border: 2px solid #FFF;
		}
		
        textarea {
            resize: none;
        }
        a.button {
            font-size: 18px;
            color: #ffffff;
            padding: 8px 10px;
            border: 0px;
            background-color: #5E4485;
            font-family: "Times New Roman";
            -webkit-appearance: button;
            -moz-appearance: button;
            appearance: button;

            text-decoration: none;
        }
        li {
            margin-right: 3px;
            margin-left: 3px;
        }
        .input-group {
            width: 250px;
            padding: 5px;
        }
        .btn {
            font-size: 18px;
            color: #ffffff;
            padding: 8px 10px;
            border: 0px;
            background-color: #5E4485;
            font-family: "Times New Roman";
        }
        #icon {
            max-width: 200px;
            margin: 1% auto;
        }

        footer {
            width: 100%;
            background-color: #5E4485;

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
                <a class="navbar-brand" href="index.php"><img src="https://i.imgur.com/8E3FWoa.png"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><form action='index.php'>
                            <button class='btn btn-warning'>Home</button>
                        </form></li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<li><form action='profile.php'>
                                        <button class='btn btn-warning'>My Profile</button>
                                      </form></li>
                                             <li><form action='search.php' method='post'>
                                              <div class=\"input-group\">
                                                <input type=\"text\" class=\"form-control\" placeholder=\"Search\" name='profile'>
                                                
                                              </div>
                                            </form></li>
                                  <li><form action='includes/logout.inc.php'>
                                        <button class='btn btn-danger'>Log Out</button>
                                      </form></li>";
                        }
                        ?>

                </ul>

            </div>
        </div>
    </nav>
</header>
