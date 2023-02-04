<?php include "parts/header.php"; ?>

                    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Courses</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Courses</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

                <div class='container-xxl '>
                <div class='container py-5 pt-lg-0'>
                    <form class="row g-2 search-form" action="search.php" method="get" autocomplete="off">
                    <h3>search</h3>
                    <div class="col-auto">
                        <input type="text" name="q" class="form-control" placeholder="search">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">search</button>
                    </div>
                </form>
                <div class='row g-5'>
                            <?php
                            $result2 = mysqli_query($conn,"SELECT * FROM category WHERE post_under_cat > 0 ORDER BY cid DESC LIMIT 0,12");
                            if($err = mysqli_error($conn)){
                                die($err);
                            }else{
                                if(mysqli_num_rows($result2) > 0){
                                    while($rows2 = mysqli_fetch_assoc($result2)){
                                        $active = (isset($_GET['cid']) && $_GET['cid'] == $rows2['cid'])? "active":"";
                                        echo "      
                                                <div class='col-lg-4 wow fadeIn' data-wow-delay='0.1s'>                                               
                                                <div class='bg-white shadow d-flex align-items-center h-100 p-4' style='min-height: 150px;'>
                                                <div class='d-flex'>
                                                            <div class='mx-4 flex-shrink-0 btn-lg-square  '>
                                                                <i class='fa fa-car text-white bg-primary fa-5x'></i>
                                                            </div>
                                                            <div class='ps-4'>
                                                                <h5><a class='nav-link $active' href='category.php?cid={$rows2['cid']}&cname={$rows2['cname']}'>{$rows2['cname']}</a></h5>
                                                                
                                                            </div></div></div></div>
                                           
                                                        ";
                                    }
                                }else{
                                    echo "<li class='nav-item'><a class='nav-link' href=''>no category</a></li>";
                                }
                            }
                        ?>

                                                    
                                        </div>
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
                ?></div>      
                <nav>
                    <ul class="pagination justify-content-center">
                        <?php
                            // $r = mysqli_query($conn,"SELECT COUNT(uid) as total FROM posts p JOIN category c ON p.pcat = c.cid JOIN users u ON p.pauthor = u.uid");
                            // if($err = mysqli_error($conn)){die($err);}
                            // if(mysqli_num_rows($r) > 0){
                            //     $res = mysqli_fetch_assoc($r);
                            //     $total = $res['total'];
                            //     $total_page = ceil($total / $limit);
                            //     if($page > 1){
                            //         echo "<li class='page-item'><a class='page-link' href='index.php?page=".($page - 1)."'>previous</a></li>";
                            //     }
                            //     for($i=1;$i <= $total_page;$i++){
                            //         $a = ($page == $i)? "bg-dark text-white":"";
                            //         echo "<li class='page-item'><a class='page-link $a' href='index.php?page=$i'>$i</a></li>";
                            //     }
                            //     if($page < $total_page){
                            //         echo "<li class='page-item'><a class='page-link' href='index.php?page=".($page + 1)."'>next</a></li>";
                            //     }
                            // }else{
                            //     die("something is wrong");
                            // }
                        ?>
                    </ul>
                </nav>
            </div>
        
        </div>
  </div>
<?php include "parts/footer.php"; ?>