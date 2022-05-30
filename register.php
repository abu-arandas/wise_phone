<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Site Metas -->
        <title>WISE Phones</title>

        <!-- Site Favicon -->
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body> 

        <div class="authentication">
            <div class="container">
                <form class="login" action="php/authentication.php" method="post">
                    <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
					
                    <div class="input-group">
						<input type="text" placeholder="Username" name="username"required>
					</div>
					<div class="input-group">
						<input type="email" placeholder="Email" name="email" required>
					</div>
					<div class="input-group">
						<input type="password" placeholder="Password" name="password" required>
					</div>
					<div class="input-group">
						<input type="password" placeholder="Confirm Password" name="cpassword" required>
					</div>
                    <div class="input-group">
                        <button name="register" class="btn">Login</button>
                    </div>
                    
                    <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
                </form>
            </div>
        </div>
        
        <!-- JS -->
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>