<?php

include_once("connection.php");

?>
<html>
<head>
<title>    </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="panel panel-default container"> 

<div class="panel-heading">

<h2 style="text-align:center;"> Attendence Management System </h2>

</div>
<div class="panel-body">

<a href="view.php" class="btn btn-primary">View</a>
<a href="add.php" class="btn btn-primary pull-right">Add</a>
<form method="post">
<table class="table">
<thead>
<tr>
<th> Name         </th>
<th> Father Name   </th>
<th> Email        </th>
<th> Attendence   </th>
</tr>
</thead>
<tbody>
<?php
      $link = new mysqli("localhost" , "root" , "" , "attnd");
      $query="select * from emp";
	  $result=$link->query($query);
	  while($show=$result->fetch_assoc()){
		  

?>






<tr>
<td><?php echo $show['name']; ?></td>
<td><?php echo $show['fmane']; ?>    </td>
<td><?php echo $show['email']; ?>    </td>
<td> 
  Present <input required type="radio" name="attendence[<?php echo $show['emp_id']; ?>]" value="Present"> Absent <input required type="radio" name="attendence[<?php echo $show['emp_id']; ?>]" value="Absent" type="text">
   </td>
</tr>
	  <?php } ?>


	  

</tbody>


<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	$att = $_POST['attendence'];
 	$date=date('d-m-y');
    if($result->num_rows>0){
 	$query="select distinct date from attendence";
 	$result=$link->query($query);
 	$b=false;

 	while($check=$result->fetch_assoc()){

 		if($date==$check['date']){
 		$b=true;
 			echo "<div class='alert alert-danger'>

                        Attendence Already Taken today;

	  		  		  		</div>";
 		}
 	}
}
 	if(!$b){
 		foreach ($att as $key => $value){
 			if($value=="Present"){
 				
$query="insert into attendence(value,emp_id,date) values('Present','$key','$date')";
$insertResult=$link->query($query);

 			}
 			else{
 				$query="insert into attendence(value,emp_id,date) values('Absent','$key','$date')";
$insertResult=$link->query($query); 
 				
 			}

 		}

 		if($insertResult){
 			echo "<div class='alert alert-success'>

                        Attendence taken Succesfully;

	  		  		  		</div>";
 			
 		}
 	}
 
 }


?>





</table>
<input class="btn btn-primary" type="submit" value="Take Attendence">
</form>
</div>

<div class="panel-footer">


</div>

</div>




</body>
</html>