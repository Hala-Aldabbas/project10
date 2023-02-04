<?php 
    include "parts/header.php";

    if(isset($_POST['save']) && !empty($_POST['category'])){
        $category = mysqli_real_escape_string($conn,$_POST['category']);
        $sql = "INSERT INTO exam1(category) VALUES('$category')";
        $ans = mysqli_query($conn,$sql);
        if($err = mysqli_error($conn)){die($err);}
        if($ans){
          
        }else{
            echo "<div class='alert alert-danger'>fail!</div>";
        }
    }
?>
        <h2 class="text-capitalize p-3">add exam</h2>
        <form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="w-50 m-auto bg-light p-3 text-capitalize" method="post">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">exam name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="category" required>
                </div>
            </div>
            <input type="submit" class="btn btn-dark d-block" value="save" name="save">
        </form>
    </div>
    <?php  include "parts/dash.php"; ?>