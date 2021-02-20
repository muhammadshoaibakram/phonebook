<!DOCTYPE html>
<html>
<head>
  <title>change passsword</title>
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
    $message= '';
        if(isset($_POST['update']))
        {
          $old_password = $_POST['old_password'];
          $new_password = $_POST['new_password'];
          $confirm_password = $_POST['confirm_password'];
          if($old_password == ''  || $new_password ==''  || $confirm_password ==''  ){
             $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  
          } 
          else 
          {
             $sql = "SELECT * FROM users where id = ".$_SESSION['contact_id']." AND password = '".$old_password."'";
              $result = $connection->query($sql);

              if ($result->num_rows == 1) {
                if ($new_password == $confirm_password) {
                  $query = "UPDATE users SET password='".$new_password."' WHERE id =".$_SESSION['contact_id'];

                   $result= $connection->query($query);
                   if($result){
                      $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Password Changed successfully.</div>';
                   }else {
                      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> There was error while adding record.</div>';  
                   } 
                } else if($password != $confirm_password){
                  $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"

                  >&times;</button><strong>Error!</strong> Confirm Password does not match.</div>';  
               } 
              }else {
                  $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Old Password does not match.</div>';  
               }  


             
          }
        }
        ?>

  <body class="bg-secondary">
           <div class="container">
      <div class="row">
        <div class="col-md-3">
          
        </div>
        <div class="col-md-6  text-center mt-5 border">
            <div class="text-primary text-center mt-5 mb-5">
              <h3><em>Change password</h3></em></div>
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" >
          <?php echo $message; ?>
      <label for="old_password">old password*:</label>
      <label class="ml-5">
        <input type="password" class="form-control ml-5"  placeholder="old password" name ="old_password"></label>
             <div class="form-group">
    </div>
   
       
       <div class="form-group">
      <label for="new_password">new password*:</label>
      <label class="ml-5 mt-3">
        <input type="password" class="form-control ml-5" placeholder="Enter new password" name="new_password">
      </label>
    </div>
    <div class="form-group">
     <label for="confirm_password">confirm <br>new password:</label>
     <label class="ml-5">
      <input type="password" class="form-control  ml-5" placeholder="Enter confirm new password" name="confirm_password">
    </label>
    </div>
    <button class="bg-primary text-white mr-5" type="submit" name="update" class="btn btn-button">change</button>

   
          </form>
        </div>
        <div class="col-md-3">
        </div>
      </div>
      </div>
</body>
</html>