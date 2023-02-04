<?php 

    include("./class/users.php");
    extract($_POST);
    $updatecat = new users;
    
    
    if (isset($_POST['submit'])) {
        // The button was clicked
        $id = $_GET['updtcatid'];
        $cat = $_POST['cat'];
        if ($updatecat->update_category($id, $cat)) {
            $updatecat->url("exams.php?msg=run");
            //echo "Data inserted successfully";
        }
    }
  include "parts/header.php";
?>
        <h2 class="text-capitalize p-3">edit exam</h2>
        <form method="post" class="w-50 m-auto bg-light p-3 text-capitalize">
        <div class="mb-3 row">
        <label class="col-sm-2 col-form-label">exam name</label>
        <div class="col-sm-10">
                        <input type="text" class="form-control" id="cat" name="cat" placeholder="Enter new exam name" required>
                        <!-- <input style="margin-top: 10px;" class="form-control btn btn-primary" type="button" value="Return" onclick="history.back()"> -->
</div>
 <button  name="submit"
 type="submit" class="btn btn-dark d-block">Update</button></div>
                    </form>
    </div>
    <?php  include "parts/dash.php"; ?>