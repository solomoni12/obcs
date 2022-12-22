<?php 
session_start();
$conn=mysqli_connect('localhost','root','','elect_db');
if(isset($_POST["submit"])){
	$email=@$_POST["email"];
	$password=@$_POST['pass'];
		$cust_query= mysqli_query($conn,"SELECT * FROM customer WHERE email='$email' AND password='$password' LIMIT 1");
		$admn_query = mysqli_query($conn,"SELECT * FROM admin_info WHERE admn_email='$email' AND password='$password'LIMIT 1");
    $fetch_cust=mysqli_fetch_array($cust_query); //fetch customer row
    $fetch_admin=mysqli_fetch_array($admn_query);// fetch admin row
    $cust_row= mysqli_num_rows($cust_query);// count rows for customer
    $admn_row= mysqli_num_rows($admn_query);// count rows for admin

    //check  rows for  customer
    if($cust_row > 0){
    	$_SESSION['customer']=$fetch_cust['cust_name'];
    	$_SESSION['email']=$fetch_cust['email'];
    	$_SESSION['password']=$fetch_cust['password'];
    	header("location:store.php");
    }

    elseif($admn_row > 0){
    	$_SESSION['admn_name']=$fetch_admin['username'];
    	$_SESSION['email']=$fetch_admin['admn_email'];
    	$_SESSION['password']=$fetch_admin['password'];
    	header("location:admin/");
    }else{
    	echo "Wrong password or email";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"  href="css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet"  href="new.css">
	<title></title>
</head>
<div class="container" style="background:#fff; height: 900px;">

<body><?php 
$conn=mysqli_connect('localhost','root','','elect_db');
include 'header.php';
include'component.php';?>



			<div class="col-lg-12 py-5">
				<div class="row">
					<div class="col-md-4 offset-4 card">
						<div class="card-body">
							<form action="login.php" method="post" id="login-frm">
								<div class="logo"><h4 class="text-success text-center">LOGIN</h4></div>
								<div class="form-group">
									<label for="Email" class="control-label" style="margin-top:10px;"><h5>Email</h5></label>
									<input type="email" name="email" id="email" class="form-control">
								</div>

								<div class="form-group">
									<label for="password" class="control-label" style="margin-top:10px;"><h5>Password</h5></label>
									<input type="password" name="pass" id="password" class="form-control" >
								</div>

								<center>
									<button type="submit" class="btn btn-block col-md-3 btn-primary my-3" name="submit"><h6>Login</h6></button>
								</center>
                                 <span class="text-decoration-non"><a href="#">Forgot your password..?</a></span>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>

	</main>
</body>
</html>