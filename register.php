<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	 <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php 
require 'db.php';
$message = '';
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password =$_POST['confirm_password'];

  if($name == '' || $username == ''  || $email == ''  || $password == '' || $confirm_password ==''){
    $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>'; 

  }
  else if( $password != $confirm_password){
    
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Passwords do not match.</div>'; 
  }
  else
  {
    $emailExists = $connection->query("SELECT * FROM users WHERE email = '$email' ");
    $usernameExists = $connection->query("SELECT * FROM users WHERE username = '$username' ");

    if ($usernameExists->num_rows == 1) {
      
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Username already exists</div>';
    }
    elseif ($emailExists->num_rows == 1) {
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Email already exists</div>';
      
    }
    else
    {
        $sql = "INSERT INTO users(name, username, email, password) VALUES ('$name','$username','$email', '$password')";
        $result = $connection->query($sql);
        if($result == TRUE){
          $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Record added successfully</div>'; 
        }
        else  
        {
          $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';  
        }
    }
  }
}
?>
<body class="bg-secondary">
    <div class="container">
    	<div class="row">
    		<div class="col-md-3">
    			
    		</div>
    		<div class="col-md-6 text-center mt-5 border">
    			<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" >
      <?php echo $message; ?>
    				<div class="text-primary text-center mt-5 mb-5"><h3><em>Register</h3></em></div>
    				 <div class="form-group">
      <label for="name">name:</label>
      <label class="ml-5"><input type="name" class="form-control ml-5" id="name" placeholder="Name" name="name"></label>
    </div>
     <div class="form-group">
      <label for="username">username:</label>
      <label class="ml-4"><input type="username" class="form-control ml-5" id="username" placeholder="Username" name="username"></label>
    </div>
    	 <div class="form-group">
      <label for="email">email:</label>
      <label class="ml-5"><input type="email" class="form-control ml-5" id="email" placeholder="email" name="email"></label>
    </div>
    <div class="form-group">
      <label for="password">password:</label>
      <label class="ml-4"><input type="password" class="form-control  ml-5" id="password" placeholder="password" name="password"></label>
    </div>

    <div class="form-group">
      <label for="confirm_password">confirm<br> password:</label>
      <label class="ml-4"><input type="password" class="form-control  ml-5" id="confirm password" placeholder="confirm password" name="confirm password"></label>
    </div>
    <h3><button class="btn btn-primary ml-5 px-4" name="submit" type="submit">Register</button></h3>

    <h6 class="text-primary">All ready have an account?please login <a class="text-white" href="login.php">Here</a></h6>
    			</form>
    		</div>
    		<div class="col-md-3">
    			
    		</div>
    	</div>
    	</div>


</body>
</html>