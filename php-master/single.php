<?php include "parts/header.php"; ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 text-primary text-capitalize">

                <h2><?php echo $rows['ptitle']; ?></h2>
                <div class='py-2'>
                    <a href='category.php?<?php echo "cid=". $rows['cid']. "&cname=" . $rows['cname']; ?>' class='mx-1'><i class='fa-solid fa-tag text-primary '>  </i> &nbsp;<?php echo   $rows['cname']; ?></a><span class='mx-1'></span>
                    

                </div>
                <img src="images/<?php echo $rows['pimage']; ?>" class="rounded mx-auto d-block w-50 my-5" alt="...">
                <p class="text-dark h2"><?php echo $rows['pdesc']; ?></p>
            </div>
        </div>
    </div>
<?php include "parts/footer.php"; ?>