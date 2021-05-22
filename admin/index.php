<?php 
   session_start();  
                        
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'login-styling.php'?>
</head>
<body>

<div class="main">
 <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/UTM.png" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <?php  if(isset($_SESSION['error']))
                         {
                           echo "<div class='error'>";
                           echo $_SESSION['error'];
                           unset($_SESSION['error']);
                           echo "</div>";
                         }?>
                        <form method="POST" class="register-form" action="loginProcess.php">
                            <div class="form-group">
                                <label for="your_name"><i class="fa fa-id-card-o"></i></label>
                                <input type="text" name="userName" id="userName" placeholder="Your UserName" required="required"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fa fa-key"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required="required"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>
