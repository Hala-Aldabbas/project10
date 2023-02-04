<?php include "parts/header.php"; ?>
<?php 
include("./class/users.php");
$ans=new users;
$answer=$ans->answer($_POST);
?>

      <center>
	  <?php
	    $total_qus=$answer['right']+$answer['wrong']+$answer['no_answer'];
		$attempt_qus=$answer['right']+$answer['wrong'];
    $correct_answers=$answer['right'];
	  ?>
	  <div class="container">
	  <div class="col-sm-2"></div>
	  <div class="col-sm-8">
  <h2>Quiz Result</h2>
                        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Total no. of Question:</th>
        <th><?php echo $total_qus; ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Attemped Questions:</td>
        <td><?php echo $attempt_qus; ?></td>
      </tr>
      <tr>
        <td>Correct:</td>
        <td><?php echo $answer['right']; ?></td>
      </tr>
      <tr>
        <td>Incorrect:</td>
        <td><?php echo $answer['wrong']; ?></td>
      </tr>
      <?php
$passing_percentage = 60;

if ($correct_answers/$total_qus * 100 >= $passing_percentage) {
    echo "
    <h3 class='text-warning'>Congratulations! You have passed the exam.</h3>
    <img style='' src='images/Exam2.gif' height='150' width='150'/>";
} else {
    echo "<h3 class='text-danger'>Sorry, you have not passed the exam.</h3>
    <a class='btn btn-primary mb-4' href='./userexam.php' >Try Again</a>
    ";
}

?>

    </tbody>
  </table></div>
    <div class="col-sm-8"></div>
</div>
	  
<center>
				<a class="btn btn-primary" href="./index.php" >Back to Home</a>
				</center>
	  
	  </center>
    <?php include "parts/dash.php"; ?>