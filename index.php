<?php
    require "functies.php";
    if(isset(*$_POST['submit'])){
        $response = registerUser(*POST['email'], *$_POST['username'], *$_POST['password'], *$_POST['confirm_password']);
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        <form action="" method="post" autocomplete="off">
            <h2>Sign up</h2>
            <h4>
                Please fill in this form to create an account <br>
                <span>All fields are required</span>
            </h4>

            <div class="grid">
                <div>
                    <label>Email*</label>
                    <input type="text" name="email" value="<?php echo @$_POST['email']; ?>">
                </div>
                <div>
                    <label>Username*</label>
                    <input type="text" name="username" value="<?php echo @$_POST['username']; ?>">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo @$_POST['password']; ?>">
                </div>
                <div>
                    <label>Confirm Password*</label>
                    <input type="text" name="confirm-password" value="<?php echo @$_POST['confirm-password']; ?>">
                </div>
            </div>
            <button type="submit" name="submit">Submit</button>

            <p>Already have an account?
                <a href="login.php">Login here</a>
            </p>

            <?php
                if(@$response == "succes"){
                    ?>
                        <p class="succes">Your registration was succesful</p>
                    <?php
                }else{
                    ?>
                        <p class="error">"><?php echo @$response; ?></p>
                    <?php
                }
            ?>
        </form>
    </body>
</html>