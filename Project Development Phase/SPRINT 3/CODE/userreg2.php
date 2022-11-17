<?php
$uname=trim($_POST["username"]);
$fname=trim($_POST["fname"]);
$lname=trim($_POST["lname"]);
$mail=trim($_POST["email"]);
$ph=trim($_POST["phone"]);
$gender=trim($_POST["gender"]);
$passw=trim($_POST["pass"]);
$date= date("F j,Y"); 

$servername='localhost';
$username='root';
$password='';
$dbname='project';

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
	
	$query1="SELECT * FROM `userregistration`";
	$result=mysqli_query($conn,$query1);
	
	if(mysqli_query($conn,$query1))
	{
		$check=0;
		while($row=mysqli_fetch_assoc($result))
		{
			$name=$row['username'];
			if($uname==$name)
			{
				$check=1;
			}
		}
		if($check==0)
		{
			$query="INSERT INTO `userregistration`( `username`,`fname`, `lname`, `email`, `phone`, `gender`, `pass`, `date`) VALUES ('$uname','$fname','$lname','$mail','$ph','$gender','$passw','$date')";
			$chk=mysqli_query($conn,$query);
	
				if($chk)
				{
					$msg="<h5 style='padding:10px'>Sign Up Successfully!! Now you can <a href='userlogin1.html'>Login here</a>
					<i style='font-size:24px ;color:red;float:right' class='fa'>&#xf046;</i></h5>";
				}
				else
				{
					echo "not entered";
				}
			
		}
		else if($check==1)
		{
			function generateRandomString($length = 4) {
				return substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
			}
			
			
			
		$newname=  generateRandomString();
			$newname=$uname.$newname;
			$newname2=$uname.generateRandomString();
			$newname3=$uname.generateRandomString();
			$newname4=$uname.generateRandomString();
			$newname5=$uname.generateRandomString();
		
		
			
				$msg="<h4>User name ($uname) already exist .Please <a href='userreg1.html'> try again </a>with different.</h4><br />
				<br /><ol class='list-group list-group-flush'><li class='list-group-item list-group-item-light'>You can try $newname </li><li class='list-group-item list-group-item-light'>
				You can try $newname2</li><li class='list-group-item list-group-item-light'>You can try $newname3 </li>
				<li class='list-group-item list-group-item-light'>You can try $newname4 </li>
				<li class='list-group-item list-group-item-light'>You can try $newname5<hr /></li></ol>";
		}
	}
	else
	{
		echo "not checked";
	}
}
else
{
	echo"connection not established";
}
?>
<html>
<style>
		body{
		background-image:url('images/userreg.png');
		background-repeat: no-repeat;
		background-width:100%;
		background-height:100%;
		background-size: cover;	
	}
		.container{
		background:white;
		margin-top:10px;
		border:1px solid black;
		border-radius:10px;
	}
</style>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="main.css">
  </head>
<body>
<nav class="navbar-nav navbar-expand-sm bg-info">
		<div class="nav-item item1" style="margin-left:1%">
				<h2 onclick='window.location.reload();' style="cursor:pointer">CMS Complaint System</h2>
		</div>
		<div class="nav-item items" >
            <a class="nav-link" style="text-align: right;"; href="about.html"><i class="fa fa-sticky-note" aria-hidden="true"></i>ABOUT</a>
        </div>
		<div class="nav-item items" >
				<a class="nav-link" style="float: right;"; href="userlogin1.html"><i class="fa fa-user" aria-hidden="true"></i> USER LOGIN</a>
		</div>
		<div class="nav-item items">
				<a class="nav-link"style="float: right;"; href="userreg1.html"><i class="fa fa-book" aria-hidden="true"></i>USER REGISTRATION</a>
		</div>
		<div class="nav-item items">
				<a class="nav-link" style="float: right;"; href="adminpanel.html"><i class="fa fa-unlock-alt" aria-hidden="true"></i>ADMIN</a>
		</div>
		<div class="nav-item items">
            <a class="nav-link" style="float: right;"; href="contact.html"><i class="fa fa-phone" aria-hidden="true"></i>CONTACT US</a>
        </div>
		</nav>
		<div class="container">
		<h6><?php echo $msg;?></h6>
		</div>
</html>