<!DOCTYPE html>
<html>
<head>
  <title>Update user</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<?php 

require 'menu.php';
require 'db.php';
$sql = "SELECT * FROM users WHERE id = ".$_SESSION['contact_id'];
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

$message = '';
if(isset($_POST['update'])){

  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];

  if($name == ''  || $username =='' || $email ==''  ){
   $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

 }
 else
  {
    $usernameExists = $connection->query("SELECT * FROM users WHERE id <> '".$_SESSION['contact_id']."'AND username = '$username' ");
    $emailExists = $connection->query("SELECT * FROM users WHERE id <> '".$_SESSION['contact_id']."'AND email = '$email' ");

    if ($usernameExists->num_rows == 1) {
      
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Username already exists</div>';
    }
    elseif ($emailExists->num_rows == 1) {
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Email already exists</div>';
      
    }
 else
 {
   $query = "UPDATE users SET name = '$name', username =  '$username', email =  '$email' WHERE id ='".$_SESSION['contact_id']."'";
   $result =$connection->query($query);

          // var_dump($result); exit;

   if($result){
    header("Location:view.php"); 
  } else {
   $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';   
 }
}
}
}

?>

<body>
  <body class="bg-secondary">

    <div class="container">
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 text-center mt-5 border">
          <form action="<?php  echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <?php echo $message; ?>
            <div class="text-primary text-center mt-5 mb-5"><h3><em>Update User</h3></em></div>
            <div class="form-group">
              <label for="email">Name<span class="text-danger">*</span></label>
              <label class="ml-5"><input type="text" class="form-control ml-5"  id="name" placeholder=" Name" name="name" value="<?php echo $row['name'] ?>"></label>
              <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            </div>
            <div class="form-group">
              <label for="Dasidnation">username<span class="text-danger">*</span></label>
              <label class="ml-3"><input type="text" class="form-control ml-5" id="Dasidnation" placeholder=" Username" name="username" value="<?php echo $row['username'] ?>"></label>
            </div>

            <div class="form-group">
              <label for="Email">Email<span class="text-danger">*</span></label>
              <label class="ml-5"><input type="text" class="form-control ml-5" placeholder=" Email" name="email" value="<?php echo $row['email'] ?>"></label>
            </div>
           <button class="bg-primary text-white mr-5" type="submit" name="update" class="btn btn-button">Add</button>


         </form>
       </div>
       <div class="col-md-3">

       </div>
     </div>
   </div>


 </body>
 </html>