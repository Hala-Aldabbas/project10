<?php
    session_start();
    if(isset($_SESSION['name']) && isset($_SESSION['id']) && isset($_SESSION['role'])){
        header("Location: dashbord.php");
    }
    include "config/config.php";
    $alert = "";
    if(!empty($_POST['email']) && !empty($_POST['pword'])){
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pword = mysqli_real_escape_string($conn,$_POST['pword']);
        $pword = md5($pword);
        $sql = "SELECT * FROM users WHERE email = '$email' && pword = '$pword'";
        $res = mysqli_query($conn,$sql);
        if($err = mysqli_error($conn)){die($err);}
        if(mysqli_num_rows($res) == 1){
            $data = mysqli_fetch_assoc($res);
            $_SESSION['name'] = $data['fname'];
            $_SESSION['id'] = $data['uid'];
            $_SESSION['role'] = $data['role'];
            header("Location: dashbord.php");
        }else{
            $alert = "<div class='alert alert-danger'>username or password is wrong. </div>";
        }
    }
?>
<style>
    @media screen and (max-width: 900px){
	.agile_info {
        display: flex;
		flex-direction: column;
	}
    .left_grid_info {
    
}}
    </style>
<?php include "parts/head.php"; ?>

<div class="signinform">

        <div class="container">
            <div class="row justify-content-center">
            <div class="col-6 text-center"><?php echo $alert; ?></div>
        </div>
            <div class="agile_info">
                <div class="w3_info" style=" border: 1px solid #f3bd00">
                    <h2 style="color: #f3bd00">Login</h2>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                        <div class="left margin">
                            <label>Email Address</label>
                            <div class="input-group">
                                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                <input type="text" id="email"  name="email" placeholder="Email" maxlength="50" required>
                            </div>
                        </div>
                        <div class="left margin">
                            <label>Password</label>
                            <div class="input-group">
                                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="Password" id="Password" name="pword" placeholder="Password" maxlength="50" required>
                            </div>
                        </div>
                
                        <button class="btn py-4 px-lg-5 d-none  btn btn-primary  d-lg-block"  style="background: #f3bd00; border: 1px solid #f3bd00" name="login"  type="submit">sign in <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                        <div id="errMes" style="color: red;margin-top: 30px; float: right; width: 50%"></div>
                    </form>
                </div>
                <div class="w3l_form" style="background: #f3bd00">
                    <div class="left_grid_info">
                        <h3>You don't have an account?</h3>
                        <a href="signup.php" class="btn" >Sign Up Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <?php include "parts/footer.php"; ?>



   