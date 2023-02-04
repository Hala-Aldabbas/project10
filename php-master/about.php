<?php include "parts/header.php"; ?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                        <img class="position-absolute w-100 h-100" src="img/about-1.jpg" alt="" style="object-fit: cover;">
                        <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="img/about-2.jpg" alt="" style="width: 200px; height: 200px;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <h6 class="text-primary text-uppercase mb-2">About Us</h6>
                        <h1 class="display-6 mb-4"> Our most important objective at our Driving School is to teach safe driving for
        life.</h1>
                        <p>
        We know driving can be difficult at first, however, our instructors objective is
        to put you at ease, build confidence and safety. We do not just teach how to pass
        a driving test, but safe driving for life We are a friendly, independent and
        professional, Chichester based driving school.</p>
                      
                        <div class="row g-2 mb-4 pb-2">
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Online courses
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Take Our Exams
                            </div>
                            <div class="col-sm-6">
                                <i class="fa fa-check text-primary me-2"></i>Available 24/7
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <a class="btn btn-primary py-3 px-5" href="admin/index.php">Join us</a>
                            </div>
                            <div class="col-sm-6">
                                <a class="d-inline-flex align-items-center btn btn-outline-primary border-2 p-2" href="tel:+962771234567">
                                    <span class="flex-shrink-0 btn-square bg-primary">
                                        <i class="fa fa-phone-alt text-white"></i>
                                    </span>
                                    <span class="px-3">+962771234567</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase mb-2">Testimonial</h6>
                <h1 class="display-6 mb-4">What Our Clients Say!</h1>
            </div>
            <div class="row justify-content-center">
                  <div class='col-lg-8 wow fadeInUp' data-wow-delay='0.1s'>
                    <div class='owl-carousel testimonial-carousel'>
    <?php
            $limit = 5;
            $page = (!empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page']:1;
            $offset = ($page - 1) * $limit;
            $result = mysqli_query($conn,"SELECT * FROM contact_us ORDER BY id DESC LIMIT $offset,$limit");
            if($err = mysqli_error($conn)){
                die($err);
            }else{
                if(mysqli_num_rows($result) > 0){
                    while($rows = mysqli_fetch_assoc($result)){
                        echo "            <div class= 'testimonial-item text-center '>
                        <div class= 'position-relative mb-5 '>
                            <img class= 'img-fluid rounded-circle mx-auto ' src= 'images/profile.png ' alt= ' '>
                            <div class= 'position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle ' style= 'width: 60px; height: 60px; '>
                            <i class= 'fa fa-quote-left fa-2x text-primary '></i>
                        </div>
                        </div>
                        <p class= 'fs-4 '>{$rows['msg']}.</p>
                        <hr class= 'w-25 mx-auto '>
                        <h5>{$rows['name']}</h5>
                        <span>{$rows['subject']}</span>
                    </div>
                       ";
                    }
                }else{
                    echo "<tr><td colspan='6'>no records found.</td></tr>";
                }
            }
       	 		 
                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


<?php include "parts/footer.php"; ?>