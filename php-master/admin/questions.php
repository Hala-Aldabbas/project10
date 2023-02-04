<?php
include("./class/users.php");
$exam = new users;
$question = $exam->exam_shows();





?>
<?php include "parts/header.php"; ?>
        <div class="row align-items-center">
            <div class="col-md-9"><h2 class="text-capitalize p-3">all questions</h2></div>
            <div class="col-md-3"><a href="createquiz.php" class="btn btn-dark">add question</a></div>
        </div>
        <div class="row">
            <table class="table text-center table-hover text-capitalize">
            <form method="post" action="delete_question.php">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Question</th>
                        <th>option 1</th>
                        <th>option 2</th>
                        <th>option 3</th>
                        <th>option 4</th>
                        <th>Correct</th>
                        <th>Exam </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                                    foreach ($question as $c) { ?>
                                        <tr>
                                        <td><?php echo $c['qid']; ?>
                                            </td>
                                            <td>
                                                <?php echo $c['question']; ?>
                                            </td>
                                            <td>
                                                <?php echo $c['ans1']; ?>
                                            </td>
                                            <td>
                                                <?php echo $c['ans2']; ?>
                                            </td>
                                            <td>
                                                <?php echo $c['ans3']; ?>
                                            </td>
                                            <td>
                                                <?php echo $c['ans4']; ?>
                                            </td>
                                            <td>
                                                <?php echo $c['ans']; ?>
                                            </td>
                                            <td>
                                                <?php echo $c['category']; ?>
                                            </td>
                                            <td>
                                            <input type="hidden" name="qid" value="<?php echo $p['qid']; ?>">
                                                <button type="submit" class="btn btn-danger mx-2 text-capitalize  mt-1"
                                                   >Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                </tbody>
               </form>
            </table>
            <?php
                    $limit = 3;
                    $page = (!empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page']:1;
                    $offset = ($page - 1) * $limit;
                    $result = mysqli_query($conn,"SELECT * FROM questions1 ORDER BY qid DESC LIMIT $offset,$limit");
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
                        $r = mysqli_query($conn,"SELECT COUNT(qid) as total FROM questions1");
                        if($err = mysqli_error($conn)){die($err);}
                        if(mysqli_num_rows($r) > 0){
                            $res = mysqli_fetch_assoc($r);
                            $total = $res['total'];
                            $total_page = ceil($total / $limit);
                            if($page > 1){
                                echo "<li class='page-item'><a class='page-link' href='questions.php?page=".($page - 1)."'>previous</a></li>";
                            }
                            for($i=1;$i <= $total_page;$i++){
                                $a = ($page == $i)? "bg-dark text-white":"";
                                echo "<li class='page-item'><a class='page-link $a' href='questions.php?page=$i'>$i</a></li>";
                            }
                            if($page < $total_page){
                                echo "<li class='page-item'><a class='page-link' href='questions.php?page=".($page + 1)."'>next</a></li>";
                            }
                        }else{
                            die("something is wrong");
                        }
                        mysqli_close($conn);
                    ?>
                </ul>
            </nav>
            
        </div>
    </div>
    <?php  include "parts/dash.php"; ?>