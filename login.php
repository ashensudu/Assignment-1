<?php
    if(isset($_POST['submit'])){

	$user = $_POST['uname'];
	$pass = $_POST['pass'];
		
	if(strcmp($user,'ashen')==0 &&strcmp($pass,'12345')==0)
	{
            session_set_cookie_params(300);
            session_start();
            session_regenerate_id();
			
            setcookie('session_cookie', session_id(), time() + 300, '/');

            $_SESSION['CSRF_Token'] = sha1(base64_encode(openssl_random_pseudo_bytes(30)));
		
            header("Location:profile.php");
            exit;
        }
	else
	{
            echo "<script>alert('Username or Password invalid!')</script>";
        }
    }
?>

<!doctype html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>CSRF-STP</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background-image: url('images/main1.jpg'); color: white; background-size: cover; ">
        <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
        <div class="col-md-4 col-offset-3" align="center">
        <form class="form-horizontal" action="login.php" method="POST">
			  <fieldset>
			    <div id="legend">
                <div class="alert alert-success" role="alert">Login</div>
			    </div>
			    <div class="control-group">
			      
			      <label class="control-label"  for="username">Username</label>
			      <div class="controls">
			        <input  type="text" id="uname" name="uname" placeholder="Username" class="input-xlarge form-control">
			      </div>
			    </div>
			    <div class="control-group">
			      
			      <label class="control-label" for="password">Password</label>
			      <div class="controls">
			        <input type="password" id="pass" name="pass" placeholder="Password" class="input-xlarge form-control">
			      </div>
			    </div>
			    <div class="control-group">
			      
			      <div class="controls">
                  <input type="submit" value="Login" id="submit" name="submit" class="btn btn-success" style="width:130px;margin-top:10px">
			      </div>
			    </div>
			  </fieldset>
			</form>
            </div>
        </div>
        </div>
        
    </body>
</html>
