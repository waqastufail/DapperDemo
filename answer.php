<?php

include("class/users.php");
$ans = new users;
$answer=$ans->answer($_POST);



?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
<title> Answer </title>

</head>
<body>

<center>

<?php 
$total_qus=$answer['right']+$answer['wrong']+$answer['no_answer'];
$attempted_qus=$answer['right']+$answer['wrong'];
?>
<div class="container">
<div class="col-sm-2"> </div>
<div class="col-sm-8"> 
  <h2>Your Quiz Result</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Total No Of Questions</th>
        <th><?php echo $total_qus; ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Attempted Questions</td>
        <td><?php echo $attempted_qus; ?></td>
      </tr>
      <tr>
        <td>Right Answer</td>
        <td><? echo $answer['right']; ?> </td>
      </tr>
      <tr>
        <td>Wrong Answer</td>
        <td><? echo $answer['wrong']; ?></td>
      </tr>
	  <tr>
        <td>No Answer</td>
        <td><? echo $answer['no_answer']; ?></td>
      </tr>
	  <tr>
        <td>Percentage</td>
        <td><? 
		$per=($answer['right']*100)/($total_qus);
		echo $per."%"; ?></td>
      </tr>
	  
	  
    </tbody>
  </table> </div>
  <div class="col-sm-2"> </div>

</div>


</center>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>