<?php
    include "admin/config/config.php";
    $cur_page = pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME);
    // $website = ["contact_us"];
    $seo_title = "";$seo_desc = "";
    switch($cur_page){
        case "single":
            if(empty($_GET['pid']) || !is_numeric($_GET['pid'])){header("Location: index.php");}
            $query = "SELECT * FROM posts p JOIN category c ON p.pcat = c.cid JOIN users u ON p.pauthor = u.uid WHERE pid = {$_GET['pid']}";
            $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
            if(mysqli_num_rows($result) == 1){
                $rows = mysqli_fetch_assoc($result);
                $seo_title = $rows['ptitle'];
                $seo_desc = $rows['pdesc'];
            }else{header("Location: index.php");}
        break;
        case "search":
            if(empty($_GET['q'])){header("Location: index.php");}
            $seo_title = "showing result for {$_GET['q']}.";
            $seo_desc = "read blogs about {$_GET['q']}.";
        break;
        case "category":
            if(empty($_GET['cid']) || empty($_GET['cname']) || !is_numeric($_GET['cid'])){header("Location: index.php");}
            $seo_title = "showing result for {$_GET['cname']}.";
            $seo_desc = "read blogs about {$_GET['cname']}.";
        break;
        case "author":
            if(empty($_GET['uid']) || empty($_GET['author']) || !is_numeric($_GET['uid'])){header("Location: index.php");}
            $seo_title = "post written by {$_GET['author']}.";
            $seo_desc = "read blogs which is written by {$_GET['author']}.";
        break;
        default:
            $seo_title = "welcome to news blog website.";
            $seo_desc = "hey! here you can read amazing blogs related to sports,music,dance etc...";
    }
    function card($rows){
        $date = date_format(date_create($rows['date']),"d M Y");
        $pid = "single.php?pid={$rows['pid']}";
        $title = substr($rows['ptitle'],0,50);
        $desc = substr($rows['pdesc'],0,50);
        return "
            <div class='col-lg-4 wow fadeIn ' data-wow-delay='0.1s'>                                               
    <div class='team-item position-relative  d-flex flex-wrap' >
    
    <div class='team-item position-relative'>
    <div class='position-relative' >
        <img class='rounded mx-auto d-block w-50 '  src='images/{$rows['pimage']}' alt=''>
        <div class='team-social text-center'>
        <a href='$pid' class='btn btn-primary float-end mx-4'>read more</a>
        </div>
    </div>
    <div class='bg-light text-center p-4 ' >
        <h5 class='mt-2 h4 text-primary'>$title</h5>
        <span class='h5'>$desc</span>
    </div>
</div> </div>
</div>
        ";
    }


    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Drivin - Driving School Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assest/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assest/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assest/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assest/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Salt, Amman, Jordan</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+962771234567</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square btn-link rounded-0" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <h2 class="m-0"><i class="fa fa-car text-primary me-2"></i>Drivin</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="courses.php" class="nav-item nav-link">Courses</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <a href="admin/index.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Sign in<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
                        <?php
                            // $result2 = mysqli_query($conn,"SELECT * FROM category WHERE post_under_cat > 0 ORDER BY cid DESC LIMIT 0,12");
                            // if($err = mysqli_error($conn)){
                            //     die($err);
                            // }else{
                            //     if(mysqli_num_rows($result2) > 0){
                            //         while($rows2 = mysqli_fetch_assoc($result2)){
                            //             $active = (isset($_GET['cid']) && $_GET['cid'] == $rows2['cid'])? "active":"";
                            //             echo "<li class='nav-item'><a class='nav-link $active' href='category.php?cid={$rows2['cid']}&cname={$rows2['cname']}'>{$rows2['cname']}</a></li>";
                            //         }
                            //     }else{
                            //         echo "<li class='nav-item'><a class='nav-link' href=''>no category</a></li>";
                            //     }
                            // }
                        ?>
        