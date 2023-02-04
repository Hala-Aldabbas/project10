<?php include "parts/header.php"; ?>
<?php
include("./class/users.php");
$cat = new users;
$category = $cat->cat_shows();
// print_r($category);
?>
       <div class="container-fluid">
        <div class="row">
       

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <br>
                <br>
                <br>
                <br>
                <div style="border:none" class="table-responsive">
                    <table class="table table-striped">
                        <?php

                        if (isset($_GET['msg']) && !empty($_GET['msg'])) {
                            echo "<mark>Data inserted successfully</mark>";
                        }

                        ?>
                        <form method="post" action="add_quiz.php">
                            <div class="form-group">
                                <select class="form-control" id="sel1" name="cat">
                                    <option value="">choose category</option>
                                    <?php
                                    foreach ($category as $c) {

                                        echo "<option value=" . $c['id'] . ">" . $c['category'] . "</option>";

                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="text">Question</label>
                                <input type="text" class="form-control" name="qus" placeholder="Enter Question">
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
                            <button type="submit" class="btn btn-success">Submit</button><br>
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
        <?php include "parts/dash.php"; ?>

   