<?php 
    include "parts/header.php";

  
    $uid=$_SESSION['id'];


    

if(isset($_POST['updateUserData']))
{
    $uid =$_SESSION['id'];

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $pass = mysqli_real_escape_string($conn, $_POST['password']);
    
    // $address = mysqli_real_escape_string($conn, $_POST['address']);
    // $gender = mysqli_real_escape_string($conn, $_POST['gender']);

        $query = "UPDATE users SET fname='$fname',lname='$lname',email='$email' WHERE uid='$uid' ";
        $query_run = mysqli_query($conn, $query);
      
   
 
}
   
?>
<?php 
$query="SELECT * FROM users where uid='$uid'";
$conn->query($query);
if ($result = $conn->query($query) ) {
    while ($row = $result->fetch_assoc() ) {



?>
        <h2 class="text-capitalize p-3">edit user</h2>
        <form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="w-50 m-auto bg-light p-3 text-capitalize" method="post">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">first name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fname" value="<?php echo $row['fname']; ?>" required>
                    <input type="hidden" name="id" value="<?php echo $row['uid']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">last name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>" required>
                </div>
            </div>
           
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">user name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                </div>
            </div>
        
            <button class="btn btn-secondary" type="submit" name="updateUserData">Save changes</button>
        <?php
}
}
?>
    </div>
    <?php  include "parts/dash.php"; ?>