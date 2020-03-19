c<?php

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

<a href="#" class="btn btn-primary">View</a>
<a href="add.php" class="btn btn-primary pull-right">Add</a>
<form method="post">
<table class="table">
<thead>
<tr>
<th> Sr No.         </th>
<th> Name  </th>
<th> Father name     </th>

<th> Email    </th>

<th> Attendence    </th>
</tr>
</thead>

<?php     
if($_GET['date']){
$date=$_GET['date'];

      $query="select emp.*,attendence.* FROM attendence inner join emp on attendence.emp_id=emp.emp_id and attendence.date='$date'";
      $result=$link->query($query);

      if($result->num_rows>0){
      	$i=0;
      	while($val=$result->fetch_assoc()){
      		$i++;
      



?>




<tr>
     <td> <?php  echo $i;    ?>  </td>

     <td> <?php echo $val['name'];   ?>   </td>
     <td> <?php echo $val['fmane'];   ?>   </td>
     <td> <?php echo $val['email'];   ?>   </td>
<td>

Present <input type="radio" 
 value="Present"
<?php
if($val['value']=='Present')
 echo "Checked";


?>
>
         
        Absent <input type="radio" 
 value="Absent"
<?php
if($val['value']=='Absent')
echo "Checked";



?>
>
 </td>  





</tr>

<?php  } } }    ?>

</div>

<div class="panel-footer">


</div>

</div>




</body>
</html>