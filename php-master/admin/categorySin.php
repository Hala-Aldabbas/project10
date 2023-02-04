<?php include "parts/header.php"; ?>
    <div class="container mt-3">
        <div class="row ">
            <div class="col-md-12">
                <h3 class='text-capitalize pb-2'>result for : <?php echo $_GET['cname']; ?></h3>
                <?php
                    $limit = 5;
                    $page = (!empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page']:1;
                    $offset = ($page - 1) * $limit;
                    $query = "SELECT * FROM posts p JOIN category c ON p.pcat = c.cid JOIN users u ON p.pauthor = u.uid WHERE pcat = {$_GET['cid']} ORDER BY pid DESC LIMIT $offset,$limit";
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
                    ?>
                    
                  <?php  function card($rows){
                        $date = date_format(date_create($rows['date']),"d M Y");
                        $pid = "single.php?pid={$rows['pid']}";
                        $title = substr($rows['ptitle'],0,50);
                        $desc = substr($rows['pdesc'],0,40000);
                        return "
                            
                    <div class='col-lg-12' wow fadeIn ' data-wow-delay='0.1s'>                                               
                    <div class='team-item position-relative d-flex flex-wrap ' >
                    <div class='team-item position-relative'>
                    <div class='position-relative'>
                        <img class='rounded mx-auto d-block w-50 my-5' src='images/{$rows['pimage']}' alt=''>
                        <div class='team-social text-center'>
                        <a href='$pid' class='btn btn-primary float-end mx-4'>read more</a>
                        </div>
                    </div>
                    <div class='bg-light text-center p-4'>
                        <h5 class='mt-2'>$title</h5>
                        <span>$desc</span>
                    </div>
                
                </div></div> </div>
                        ";
                    }
                
                ?>
               
            </div>
     
        </div>
    </div>
<?php include "parts/dash.php"; ?>