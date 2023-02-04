<?php include "parts/header.php"; 
 function qus_show($qus)
{

    $query = $this->conn->query("SELECT * FROM questions WHERE qexam='$question'");
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $this->qus[] = $row;
    }
    return $this->qus;

}
?>
<script type="text/javascript">
  function timeout()
  {
	  var minute=Math.floor(timeLeft/60);
	  var second=timeLeft%60;
	  if(timeLeft<=0)
	  {  
         clearTimeout(tm);
		 document.getElementById("form1").submit();
	  }
	  else
	  {   if(minute<10)
		  {
			  minute="0"+minute;
		  }
		  if(second<10)
		  {
			  second="0"+second;
		  }
		 document.getElementById("time").innerHTML=minute+":"+second;
		 document.getElementById("time").style.color = "red";
	  }
	  timeLeft--;
	var tm=setTimeout(function(){timeout()},1000);
	
	
  } 
  
  $(document).ready(function() {

    $(document)[0].oncontextmenu = function() { return false; }

    $(document).mousedown(function(e) {
        if( e.button == 2 ) {
            alert('Sorry, this functionality is disabled!');
            return false;
        } else {
            return true;
        }
    });
});
  </script>
  
<body onload="timeoccut()">

<div class="container">
   <div class="col-sm-2"></div>
    <div class="col-sm-8">
  <h2>QUIZ</h2>
   <script type="text/javascript">
    var timeLeft=2*60;
  
  </script>
  
  <div id="draggable" class="ui-widget-content">
  <p><div id="time" style="float:right">Time</div>
  <div  style="float:right">Timeleft :</div></p>
</div>


  
  <form method="post"  id="form1"  action="answer.php">
  <?php 
    $i=1;
  foreach($question->question as $qust) {?>
    <table class="table table-bordered">
    <thead>
      <tr class="info">
        <th><?php echo $i; ?>&nbsp;<?php echo $qust['question'];?> </th>
      </tr>
    </thead>
    <tbody>
	    <?php if(isset($qust['ans1']) ){ ?>
      <tr>
        <td>&nbsp;&emsp;<input type="radio" value="0" name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans1']; ?></td>
      </tr>
		<?php }?>
		<?php if(isset($qust['ans2']) ){ ?>
	  <tr>
        <td>&nbsp;&emsp;<input type="radio" value="1"  name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans2']; ?></td>
      </tr>
	  <?php }?>
		<?php if(isset($qust['ans3']) ){ ?>
	  <tr>
        <td>&nbsp;&emsp;<input type="radio" value="2" name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans3']; ?></td>
      </tr>
	  <?php }?>
		<?php if(isset($qust['ans4']) ){ ?>
	  <tr>
        <td>&nbsp;&emsp;<input type="radio" value="3"  name="<?php echo $qust['id']; ?>" />&nbsp;<?php echo $qust['ans4']; ?></td>
      </tr>
	  <?php }?>
	 
        <input type="radio" checked="checked" style="display:none" value="no_attempt"  name="<?php echo $qust['id']; ?>"/>
      
      </tbody>
  </table>
  <?php $i++; }?>
   <center><input type="submit"  value="submit" class="btn btn-success"/></center>
   </form>
  </div>
  <div class="col-sm-2"></div>
  
  </div>

<?php include "parts/dash.php"; ?>