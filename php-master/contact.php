<?php
 include "admin/config/config.php";
 $alert = "";
 if(isset ($_POST ['name'])){
    if(empty($_POST ['name']) || empty($_POST['subject']) || empty( $_POST [ 'email']) || empty ($_POST ['msg'])){

        $alert = "<div class='alert alert-danger'>All the field is required</div>";
      

   } else if ( ! filter_var ( $_POST [ 'email' ], FILTER_VALIDATE_EMAIL)){
    $alert =  "<div class='alert alert-danger'>Enter your valid email address</div>" ;

   } else if ( strlen ($_POST ['msg'] ) <10 ){
    $alert =  "<div class='alert alert-danger'>Message length should greater than 10 characters</div>"  ;
     

   }else if ( strlen ($_POST ['name'] ) <4 ){
    $alert = "<div class='alert alert-danger'> The name must be more than three letters</div>" ;
  
} else {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']); 
    $subject = mysqli_real_escape_string($conn,$_POST['subject']);
    $msg = mysqli_real_escape_string($conn,$_POST['msg']);

    $sql = "INSERT INTO contact_us(name,email,subject , msg) VALUES('$name','$email','$subject','$msg')";
    $ans = mysqli_query($conn,$sql);

    if($err = mysqli_error($conn)){die($err);}
    if($ans){
        $alert = "<div class='alert alert-success'>Thank you for contacting us </div>";
        
    }else{
       $alert = "<div class='alert alert-danger'>Something Went wrong. </div>";
    }}

}

?>


<?php include "parts/header.php"; ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

 
    <!-- Contact Start -->
    <div class="container-xxl py-6">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 text-center">
                <?php echo $alert; ?></div>
        </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 450px;">
                    <div class="position-relative h-100">
                        <iframe class="position-relative w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3491699.6750456477!2d37.12262705!3d31.27988555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15006f476664de99%3A0x8d285b0751264e99!2sJordan!5e0!3m2!1sen!2sjo!4v1674563852384!5m2!1sen!2sjo"
                        frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <h6 class="text-primary text-uppercase mb-2">Contact Us</h6>
                    <h1 class="display-6 mb-4">Have Any Query</h1>
                    <p class="mb-4">TIf you want to ask a question send a message or submit a testimonial, please use the online form below.</a>.</p>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  type="text"  class="form-control border-0 bg-light"  name="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-light"  name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-0 bg-light" name="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control border-0 bg-light" placeholder="Leave a message here" name="msg" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" value="save" name="save" type="submit" >Send Message</button>
                            </div>
                        </div>
                    </form>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php include "parts/footer.php"; ?>