<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<title>Reset Password - SEV Coi</title>
</head>
<body>
	<div class="wrapper">
        <img src="account/img/logo.png" class="portal-logo">
        <p>Pinagbubuklod ang bawat pamilya</p>
        <h2>Reset Password</h2>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>OTP CODE</label><br>
                <input type="text" name="username" class="form-control" autocomplete="off">
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>