<?php
include("./class/users.php");
$cat = new users;
$category = $cat->cat_shows();


?>
<?php include "parts/header.php"; ?>
<div class="row align-items-center">
            <div class="col-md-9"><h2 class="text-capitalize p-3">all Exams</h2></div>
            <div class="col-md-3"><a href="add_exam.php" class="btn btn-dark">Add Exam</a></div>
        </div>
        

        <div class="row">
            <table class="table text-center table-hover text-capitalize">
                        <form method="post" action="delete_exam.php">
                                <thead>
                                    <tr>
                                    <th>.no</th>
                                     <th>Exam name</th>
                                     <th></th>
                                     <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($category as $c) { ?>
                                        <tr>
                                        <td><?php echo $c['id']; ?>
                                            </td>
                                            <td>
                                                <?php echo $c['category']; ?>
                                            </td>
                                            <td>
                                            </td>
                                            
                                            <td >
                                                <?php echo '<a class="btn btn-success mx-2 text-capitalize  mt-1" href="edit_exam.php?updtcatid=' . $c['id'] . '">Update</a>' ?>
                                                <input type="hidden" name="id" value="<?php echo $c['id']; ?>">
                                                <button type="submit" class="btn btn-danger mx-2 text-capitalize  mt-1"
                                                   >Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                      
                        </form>
                    </table>
                    <?php
                    $limit = 3;
                    $page = (!empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page']:1;
                    $offset = ($page - 1) * $limit;
                    $result = mysqli_query($conn,"SELECT * FROM exam1 ORDER BY id DESC LIMIT $offset,$limit");
                    if($err = mysqli_error($conn)){
                        die($err);
                    }else{
                        if(mysqli_num_rows($result) > 0){
                            while($rows = mysqli_fetch_assoc($result)){
                                echo "";
                            }
                        }else{
                            echo "<tr><td colspan='4'>no records found.</td></tr>";
                        }
                    }
                ?>
                    <nav>
                <ul class="pagination justify-content-center">
                    <?php
                        $r = mysqli_query($conn,"SELECT COUNT(cid) as total FROM category");
                        if($err = mysqli_error($conn)){die($err);}
                        if(mysqli_num_rows($r) > 0){
                            $res = mysqli_fetch_assoc($r);
                            $total = $res['total'];
                            $total_page = ceil($total / $limit);
                            if($page > 1){
                                echo "<li class='page-item'><a class='page-link' href='category.php?page=".($page - 1)."'>previous</a></li>";
                            }
                            for($i=1;$i <= $total_page;$i++){
                                $a = ($page == $i)? "bg-dark text-white":"";
                                echo "<li class='page-item'><a class='page-link $a' href='category.php?page=$i'>$i</a></li>";
                            }
                            if($page < $total_page){
                                echo "<li class='page-item'><a class='page-link' href='category.php?page=".($page + 1)."'>next</a></li>";
                            }
                        }else{
                            die("something is wrong");
                        }
                        mysqli_close($conn);
                    ?>
                </ul>
            </nav>
           
    </div>
<?php  include "parts/dash.php"; ?>