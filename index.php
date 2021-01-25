<?php
require('db.inc.php');
$msg="";
if(isset($_POST['email']) && isset($_POST['password'])){
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$res=mysqli_query($con,"select * from employee where email='$email' and password='$password'");
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['ROLE']=$row['role'];
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['name'];

      if($_SESSION['ROLE']==1){
         header('location:admin/index.php');
         die();
      }
      elseif ($_SESSION['ROLE']==2) {
         header('location:user/dashboard.php');
         die();
      }
      else
      {
         echo "YOU ARE NOT MEMBER";
      }

		
	}else{
		$msg="Please enter correct login details";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" autofocus name="email">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <label class="checkbox">
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>
      </div>
      <div class="result_msg" style=" padding-bottom: 10px; color: red; margin-left: 30px;"><?php echo $msg?></div>
    </form>
  </div>


</body>

</html>

