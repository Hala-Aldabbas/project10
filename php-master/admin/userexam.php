<?php
include("./class/users.php");
$profile = new users;
$profile->cat_shows();

?>
<script>
    var i = 0;
    var txt = "You will have only five minutes per each Exam,You should get more than 60% to pass the Exam, once time goes off You can't select any option , If you Refresh your browser, The Exam will start all over again, You will get one Point in every correct answar.";
    var speed = 20;

    function typeWriter() {
      if (i < txt.length) {
        document.getElementById("typewriting").innerHTML += txt.charAt(i);
        i++;
        setTimeout(typeWriter, speed);
      }
    }
</script>
<style>
  .set-position{
    position : absolute;
    top : -30px;
  
    z-index: 1;
  }
  #typewriting{
    background-color : #fafafa;
    margin-top : 10px;
    font-size : 16px;
    text-align: justify;
    padding: 10px;
  
  }
 
  </style>
<?php include "parts/header.php"; ?>
<center>

<div class="col-md-8 set-position ">
<button type="button" class="btn btn-dark" onclick="typeWriter()">Some Rules of this Quiz</button>
<div id="typewriting"></div>
</div>
</center>
<hr>
<center>
					<button type="button" class="btn btn-primary" style="background:orange" data-toggle="tab" href="#select">StartQuiz</button>
				</center>

                <center>
                <div class="col-sm-4"><br>
					<div id="select" class="tab-pane fade">

						<form method="post" action="qus_show.php">
							<select class="form-control" id="select" name="cat">
								<option>select exam</option>
								<?php
								foreach ($profile->cat as $category) { ?>
									<option value="<?php echo $category['id']; ?>">
										<?php echo $category['category']; ?>
									</option>
								<?php } ?>
							</select><br>
							<center><input type="submit" value="Start" class="btn btn-info"></center>
						</form>


					</div>
				</div>
                </center>


<?php include "parts/dash.php"; ?>