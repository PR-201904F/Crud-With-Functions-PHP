<?php

$sername = "localhost";
$username = "root";
$password = "";
$database = "crud";

$connect = mysqli_connect($sername,$username,$password,$database);


function insert(){
	global $connect;
	
	
	if(isset($_POST['btn'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$des = $_POST['des'];
		
		
		$insert = "insert into contact (name,email,msg) values('$name','$email','$des')";
		$run = mysqli_query($connect,$insert);
		
		if($run){
			echo "insert";
		}else {
			echo "not insert";
		}
	}
	
}



function view(){
	global $connect;
	
	$output = "";
	
	$view = "select * from contact";
	$run = mysqli_query($connect,$view);
	$sn =0;
	while($fetch = mysqli_fetch_array($run)){
		
		$id = $fetch['0'];
		$name = $fetch['1'];
		$email = $fetch['2'];
		$des = $fetch['3'];
		
		$output .= "
		
		<tr>
          <td>".++$sn."</td>
          <td>$name</td>
          <td>$email</td>
          <td>$des</td>
          <td>
              <a href='user.html'><i class='icon-pencil'></i></a>
              <a href='view.php?Delete=$id' ><i class='icon-remove'></i></a>
          </td>
        </tr>
		
		";
		
		
		
	}
	echo  $output;
	
	
}

function Delete(){
	global $connect;
	error_reporting(0);
	if($_GET['Delete']){
		
		$get_id = $_GET['Delete'];
		
		$delete = "delete from contact where id='$get_id'";
		$run = mysqli_query($connect,$delete);
		
		if($run){
			echo "<script>location.href='view.php';</script>";
		}else {
			echo "not delete";
		}
		
	}
}







?>