<?php 
    include "parts/header.php";
    if(!isset($_POST['update']) && (empty($_GET['cid']) || empty($_GET['cname']) || !is_numeric($_GET['cid']))){
        header("Location: category.php");
    }
    if(isset($_POST['update']) && !empty($_POST['cname']) && !empty($_POST['cid'])){
        $cname = mysqli_real_escape_string($conn,$_POST['cname']);
        $cid = mysqli_real_escape_string($conn,$_POST['cid']);
        $sql = "UPDATE category SET cname = '$cname' WHERE cid = $cid";
        $ans = mysqli_query($conn,$sql);
        if($err = mysqli_error($conn)){die($err);}
        if($ans){
            header("Location: category.php");
        }else{
            echo "<div class='alert alert-danger'>fail!</div>";
        }
        die("something is wrong");
    }
    $cid = mysqli_real_escape_string($conn,$_GET['cid']);
?>
  <div class="col-sm-12 col-sm-offset-3 col-md-12 col-md-offset-2 main">
        <h2 class="text-capitalize p-3 page-header">edit category</h2>
        <form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="w-50 m-auto bg-light p-3 text-capitalize" method="post">
            <div class="mb-3 row">
                <label class="col-sm-5 col-form-label">category name</label>
                <div class="col-sm-6 ">
                    <input type="text" class="form-control" name="cname" value="<?php echo $_GET['cname']; ?>" placeholder="Enter new category name" required>
                    <input type="hidden" name="cid" value="<?php echo $_GET['cid']; ?>">
                </div>
            </div>
            <input type="submit" class="btn btn-dark d-block" value="update" name="update">
        </form>
    </div>
    <?php  include "parts/dash.php"; ?>