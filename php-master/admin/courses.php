<?php include "parts/header.php"; ?>

                

                <div class='container-xxl py-6'>
                <div class='container py-5 pt-lg-0'>
                  
                    <h3>All Courses</h3>
               
             
                                        
                    </div>
                                  


   
        <div class="row ">
            <div class="col-md-12 wow fadeInUp">
                <div class='  d-flex flex-wrap ' >
        
                
                <?php
                    $limit = 50;
                    $page = (!empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page']:1;
                    $offset = ($page - 1) * $limit;
                    $query = "SELECT * FROM posts p JOIN category c ON p.pcat = c.cid JOIN users u ON p.pauthor = u.uid ORDER BY pid DESC LIMIT $offset,$limit";
                    $result = mysqli_query($conn,$query);
                    if($err = mysqli_error($conn)){
                        die($err);
                    }else{
                        if(mysqli_num_rows($result) > 0){
                            while($rows = mysqli_fetch_assoc($result)){
                                echo card($rows);
                            }
                        }else{
                            echo "<div class='alert alert-danger'>no posts found</div";
                        }
                    }
                
                    function card($rows){
                        $date = date_format(date_create($rows['date']),"d M Y");
                        $pid = "single.php?pid={$rows['pid']}";
                        $title = substr($rows['ptitle'],0,50);
                        $desc = substr($rows['pdesc'],0,100);
                        return "
                            <div class='col-lg-4 wow fadeIn ' data-wow-delay='0.1s'>                                               
                    <div class='team-item position-relative  d-flex flex-wrap' >
                    
                    <div class='team-item position-relative'>
                    <div class='position-relative'>
                        <img class='img-fluid' src='images/{$rows['pimage']}' alt=''>
                        <div class='team-social text-center'>
                        <a href='$pid' class='btn btn-primary float-end mx-4'>read more</a>
                        </div>
                    </div>
                    <div class='bg-light text-center p-4'>
                        <h5 class='mt-2'>$title</h5>
                        <span>$desc</span>
                    </div>
                </div> </div>
                </div>
                        ";
                    }
                
                ?></div>      
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php
                            $r = mysqli_query($conn,"SELECT COUNT(uid) as total FROM posts p JOIN category c ON p.pcat = c.cid JOIN users u ON p.pauthor = u.uid");
                            if($err = mysqli_error($conn)){die($err);}
                            if(mysqli_num_rows($r) > 0){
                                $res = mysqli_fetch_assoc($r);
                                $total = $res['total'];
                                $total_page = ceil($total / $limit);
                                if($page > 1){
                                    echo "<li class='page-item'><a class='page-link' href='index.php?page=".($page - 1)."'>previous</a></li>";
                                }
                                for($i=1;$i <= $total_page;$i++){
                                    $a = ($page == $i)? "bg-dark text-white":"";
                                    echo "<li class='page-item'><a class='page-link $a' href='index.php?page=$i'>$i</a></li>";
                                }
                                if($page < $total_page){
                                    echo "<li class='page-item'><a class='page-link' href='index.php?page=".($page + 1)."'>next</a></li>";
                                }
                            }else{
                                die("something is wrong");
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        
        </div>
  </div>
<?php include "parts/dash.php"; ?>