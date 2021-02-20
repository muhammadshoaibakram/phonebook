<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php 


require 'menu.php'; 
require 'db.php';
$sql = "SELECT * FROM users where id = ".$_SESSION['contact_id'];
$result=$connection->query($sql);
// var_dump($result); exit;
if ($result->num_rows > 0) {
  $count=$result->num_rows;
}
else{
  $count=0;
}

if (!$_SESSION) {
    header("Location: login.php");
  }


?>
<body class="bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h3 class="text-center mt-5">Logged in as <?php echo $_SESSION['username']; ?> </h3>

        <h3 class="text-center mt-5 pt-5"></b>Total users in Your Contact<br><span class="text-dark bg-light px-2" style="border-radius: 5px;"><?php echo $count; ?></span></h3> 
      </div>
      <div class="col-md-4"></div>
    </div>
  </div> 
</body>
</html>