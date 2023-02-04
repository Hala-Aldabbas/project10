<?php include "parts/header.php"; ?>
<?php  include "config/config.php"; ?>
        

                <div class='container-xxl py-6'>
                <div class='container py-5 pt-lg-0'>
                
                <h3>All Categorys</h3>                 
                    </div>
                    <div class="col-md-9">
              
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
                                                                <i class='fa fa-car text-warning  fa-5x'></i>
                                                            </div>
                                                            <div class='ps-4'>
                                                                <h5><a class='nav-link $active' href='categorySin.php?cid={$rows2['cid']}&cname={$rows2['cname']}'>{$rows2['cname']}</a></h5>
                                                                
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
<?php include "parts/dash.php"; ?>