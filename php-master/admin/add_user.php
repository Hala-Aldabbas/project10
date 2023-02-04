<?php 
    include "parts/header.php";

    if(isset($_POST['save']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['pword']) && isset($_POST['role'])){
        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pword = md5($_POST['pword']);
        $role = mysqli_real_escape_string($conn,$_POST['role']);
        $sql = "INSERT INTO users(fname,lname,email,pword,role) VALUES('$fname','$lname','$email','$pword','$role')";
        $ans = mysqli_query($conn,$sql);
        if($err = mysqli_error($conn)){die($err);}
        if($ans){
            header("Location: users.php");
        }else{
            echo "<div class='alert alert-danger'>fail!</div>";
        }
    }
?>
        <h2 class="text-capitalize p-3">add user</h2>
        <form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="w-50 m-auto bg-light p-3 text-capitalize" method="post">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">first name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fname" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">last name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="lname" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pword" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">user role</label>
                <div class="col-sm-10">
                    <select class="form-select" name="role" required>
                        <option value="0">normal user</option>  
                        <option value="1">admin</option>  
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-dark d-block" value="save" name="save">
        </form>
    </div>
    <?php  include "parts/dash.php"; ?>