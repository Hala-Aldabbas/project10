<?php
    session_start();
    if(!isset($_SESSION['name']) || !isset($_SESSION['id']) || !isset($_SESSION['role'])){
       
    }
    $cur_page = pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME);
    $admin_pages = ["users","edit_user","delete_user","add_user","delete_category","category","edit_category","add_category"];
    if(in_array($cur_page,$admin_pages) && $_SESSION['role'] == 0){
        header("Location: dashbord.php");
    }
   

?>

        <!doctype html>
        <html lang="en">
        <head>
                <title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css_js/color.css">
        <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class=" ">
				<div class="p-4 pt-5">
                <a href="index.php" class="navbar-brand   d-flex align-items-center  px-4 px-lg-5">
            <h2 class="m-0" style="color: white"><i class="fa fa-car  mr-2" style="color:orange" ></i>Drivin</h2>
        </a>
	        <ul class="list-unstyled components mb-5">

	      
            <li class="">
            <?php
                    $bname = basename($_SERVER['PHP_SELF']);
                    if($_SESSION['role'] == 1){
                        $arr = [
                            
                            "dashbordadmin.php" => "<i class='fa-solid fa-gauge'></i> &nbsp; Dashboard",
                            "users.php"=> "<i class='fa-solid fa-users'></i> &nbsp; Users",
                            "post.php" => "<i class='fa-solid fa-table'></i> &nbsp;Courses",
                            "category1.php" => "<i class='fa-sharp fa-solid fa-tags'></i> &nbsp; category",
                            "exams.php" => "<i class='fa-solid fa-shapes'></i> &nbsp; Exams",
                            "questions.php" => "<i class='fa-solid fa-question'></i> &nbsp; Questions",
                            "contactadmin.php" => "<i class='fa-solid fa-address-book'></i> &nbsp; contact",
                         
                        ];
                    }else{
                        $arr = [
                            "dashbord.php" => "<i class='fa-solid fa-gauge'></i> &nbsp; Dashboard",
                            "userexam.php" =>"<i class='fa-solid fa-shapes'></i> &nbsp; Exams",
                        ];
                    }
                    foreach($arr as $key => $val){
                        $active = ($bname == $key) ? "active" : "";
                        echo "<li class='nav-item text-uppercase'>
                        <a class='nav-link $active' href='$key'>$val</a>
                    </li>";
                    }
                    include "config/config.php";
                ?>
           
	        </li>
        

              
               <li class="">
              <a class="nav-link" href="profile.php"><i class="fa-solid fa-id-card"></i> &nbsp;My Acount</a>
	          </li>
              
            
              <li class="">
              <a class="nav-link" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> &nbsp; Log Out</a>
	          </li>

	        </ul>

	      </div>
    	</nav>




      
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button> -->
            <h5> &nbsp;&nbsp; Welcome  <?php echo $_SESSION['name']; ?></h5>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
             
            </div>
          </div>
        </nav>