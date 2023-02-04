<?php 
  
   
    include("./class/users.php");
    extract($_POST);
    $updateques = new users;
    $cat = new users;
    $category = $cat->cat_shows();
    
    if (isset($_POST['submit'])) {
        // The button was clicked
        $question = $_POST['question'];
        $ans1 = $_POST['op1'];
        $ans2 = $_POST['op2'];
        $ans3 = $_POST['op3'];
        $ans4 = $_POST['op4'];
        $answer = $_POST['ans'];
        if ($updateques->update_question($question,$ans1,$ans2,$ans3,$ans4,$ans)) {
            $updateques->url("questions.php?msg=run");
            //echo "Data inserted successfully";
        }
    }
  include "parts/header.php";
?>
<h2 class="text-capitalize p-3">edit question</h2>
        <form method="post" class="w-50 m-auto bg-light p-3 text-capitalize">
        <div class="form-group">
                                <select class="form-control" id="sel1" name="cat">
                                    <option value="">choose exam</option>
                                    <?php
                                    foreach ($category as $c) {

                                        echo "<option value=" . $c['id'] . ">" . $c['category'] . "</option>";

                                    }
                                    ?>
                                </select>
                            </div>
        <div class="form-group">
                                <label for="text">Question</label>
                                <input type="text" class="form-control" name="question" placeholder="Enter Question">
                            </div>


                            <div class="form-group">
                                <label for="text">Option-1</label>
                                <input type="text" class="form-control" name="op1" placeholder="Enter Option-1 ">
                            </div>

                            <div class="form-group">
                                <label for="text">Option-2</label>
                                <input type="text" class="form-control" name="op2" placeholder="Enter Option-2">
                            </div>

                            <div class="form-group">
                                <label for="text">Option-3</label>
                                <input type="text" class="form-control" name="op3" placeholder="Enter Option-3">
                            </div>

                            <div class="form-group">
                                <label for="text">Option-4</label>
                                <input type="text" class="form-control" name="op4" placeholder="Enter Option-4">
                            </div>

                            <div class="form-group">
                                <label for="text">answer</label>
                                <input type="text" class="form-control" name="ans" placeholder="Enter answer">
                            </div>
 <button  name="submit" type="submit" class="btn btn-dark d-block">Update</button>
                    </form>
    </div>
<?php  include "parts/dash.php"; ?>