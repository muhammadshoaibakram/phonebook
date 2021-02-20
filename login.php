<!DOCTYPE html>
<html>
<head>
  <title>login</title>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php 
session_start();

if(isset($_SESSION['username'])){
  header('Location: Home page.php');
  // redirect krne k liye use krty hain header
}
$message = '';
require 'db.php';
if(isset($_POST['submit'])){


  $username = $_POST['username'];
  $password = $_POST['password'];
  // echo $username." ". $password;
  // exit;
  if($username == '' || $password == ''){
     $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

  }
  else
  {

   $query = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
   $result = $connection->query($query);



   if($result->num_rows == 1) {
     $member = $result->fetch_assoc();

     $_SESSION['username'] = $username;
     $_SESSION['contact_id'] = $member['id'];

     header('Location: home page.php'); 

   }
   else
   {
     $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Invalid username or password</div>';  

   }

  }
}

?>
<body class="bg-secondary">

 
    <div class="container text-center mt-5">
    <div class="row">
    <div class="col-md-3">
    </div>  
    <div class="col-md-6 border">
  <div class="text-primary mt-5 text-center"><h2>Login</h2></div>
      <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" >
      <?php echo $message; ?>
      <div class="form-group">
      <label for="email">Username*:</label>
      <label>
        <input type="username" class="form-control ml-5" id="Username" name="username">
      </label>
    </div>
    <div class="form-group">
     <label for="pwd">password*:</label>
     <label>
      <input type="password" class="form-control  ml-5"  id="pwd" name="password">
     </label>
    </div>

<h3><button class="bg-primary text-white mr-5 text-center" type="submit" name="submit" class="btn btn-button">LOGIN</button></h3>
 <h6>Not a member yet?rigister <a class="text-white" href="register.php">Here</a></h6>
  </form>
    </div>  
    <div class="col-md-3">
      
    </div>  
    </div>
      
    </div>
</body>
</html>