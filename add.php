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

<?php
   
	  if($_SERVER['REQUEST_METHOD']=='POST'){
	  	$name=$_POST['name'];
	   $fmane=$_POST['fmane'];
		$email=$_POST['email'];

	  		  		  	if($name==""  || $fmane=="" ||  $email==""){
	  		  		  		echo "<div class='alert alert-danger'>

                        Fields must not br empty;

	  		  		  		</div>";
	  		  		  		
	  		  		  	}
	  		  		  	else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	  		  		  		echo "<div class='alert alert-danger'>

                        Invalid email format!!!!;

	  		  		  		</div>";
	  		  		  	}
                        else{
	  		  		  	$query= "insert into emp(name,fmane,email) values('$name','$fmane','$email')";
	  		  		  	$result=$link->query($query);
	  		  		  	if($result){
	  		  		  		echo "<div class='alert alert-success'>

                        Data inserted succesfully;

	  		  		  		</div>";
	  		  		  	}
	  		  		 }

	  }
	   
	   
	   
	   ?>


<form method="POST">
<a href="#" class="btn btn-primary">View</a>
<a href="index.php" class="btn btn-primary pull-right">Back</a>

<div class="form-group">
<label for="name"> Name: </label>
<input type="text" name="name" class="form-control">
</div>

<div class="form-group">
<label for="name"> Father Name: </label>
<input type="text" name="fmane" class="form-control">
</div>

<div class="form-group">
<label for="name"> Email: </label>
<input type="text" name="email" class="form-control">
</div>

<input type="submit"  class="btn btn-primary">
</form>



</div>

<div class="panel-footer">


</div>

</div>




</body>
</html>