<?php include "parts/header.php"; ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 text-primary text-capitalize">

                <h2><?php echo $rows['ptitle']; ?></h2>
                <div class='py-2'>
                    <a href='category.php?<?php echo "cid=". $rows['cid']. "&cname=" . $rows['cname']; ?>' class='mx-1'><i class='fa-solid fa-tag text-primary '>  </i><?php echo   $rows['cname']; ?></a><span class='mx-1'> <?php echo   $rows['date']; ?></span>
                </div>
                <img src="images/<?php echo $rows['pimage']; ?>" class="rounded mx-auto d-block w-50 my-5" alt="...">
                <p class="text-dark"><?php echo $rows['pdesc']; ?></p>
            </div>
        </div>
    </div>
<?php include "parts/dash.php"; ?>