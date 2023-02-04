<?php
    session_start();
    if(isset($_SESSION['name']) && isset($_SESSION['id']) ){
        header("Location: post.php");
    }
    include "config/config.php";
    $alert = "";
    if(isset($_POST['save']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['pword']) ){
        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pword = md5($_POST['pword']);
        $sql = "INSERT INTO users(fname,lname,email,pword) VALUES('$fname','$lname','$email','$pword')";
        $ans = mysqli_query($conn,$sql);
        if($err = mysqli_error($conn)){die($err);}
        if($ans){  $alert = "<div class='alert alert-success'>Thank you for create an acount</div>";
            header("Location: users.php");
        }else{
           $alert = "<div class='alert alert-danger'>username or password is wrong. </div>";
        }}
   
?>
<style>
    @media screen and (max-width: 900px){
	.agile_info {
        display: flex;
		flex-direction: column;
	}
    .left_grid_info {
        margin-top: -170px;
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
                    <h2 style="color: #f3bd00">Sign Up</h2>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                       <div class="left margin">
                            <label>First Name</label>
                            <div class="input-group">
                                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="fname"required >
                            </div>
                        </div>
                        <div class="left margin">
                            <label>Last Name</label>
                            <div class="input-group">
                                <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="lname" required>
                            </div>
                        </div>
                        <div class="left margin">
                            <label>Email Address</label>
                            <div class="input-group">
                                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="left margin">
                            <label>Password</label>
                            <div class="input-group">
                                <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="pword" required>

                            </div>
                        </div>
                
                  
                        <button class="btn py-4 px-lg-5 d-none  btn btn-primary  d-lg-block"  style="background: #f3bd00; border: 1px solid #f3bd00" value="save" name="save" type="submit">sign in <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                        <div id="errMes" style="color: red;margin-top: 30px; float: right; width: 50%"></div>
                    </form>
                </div>
                <div class="w3l_form" style="background: #f3bd00">
                    <div class="left_grid_info" >
                    
                        <h3 style="font-size: 2.2em; margin-top:150px">Already Have An acount</h3>
                        <a href="index.php" class="btn" >Log In Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <?php include "parts/footer.php"; ?>

