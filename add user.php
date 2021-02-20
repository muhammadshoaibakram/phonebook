<!DOCTYPE html>
<html>
<head>
 <title>Add User</title>
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

$message = '';
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $designation = $_POST['designation'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  if($name == '' || $phone == ''){
    $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>'; 

    }
    else
    {
        $sql = "INSERT INTO contact_detail(name , designation , phone, address , user_id) VALUES('$name','$designation','$phone', '$address','".$_SESSION['contact_id']."')";
        $result = $connection->query($sql);
        // var_dump($sql); exit;
        if($result){
          $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Record added successfully</div>'; 
        }
        else  
        {
          $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';  
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
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <?php echo $message; ?>
        <div class="text-primary text-center mt-5 mb-5"><h3><em>Add User</h3></em></div>
        <div class="form-group">
           <label for="email">name<span class="text-danger">*</span></label>
          <label class="ml-5"><input type="text" class="form-control ml-5"  id="name" placeholder=" name" name="name"></label>
        </div>
        <div class="form-group">
          <label for="designation">designation:</label>
          <label class="ml-3">
            <input type="text" class="form-control ml-5" id="designation" placeholder=" designation" name="designation"></label>
          </div>
          <div class="form-group">
            <label for="email">phone<span class="text-danger">*</span></label>
            <label class="ml-5">
              <input type="text" class="form-control ml-5" id="phone" placeholder=" phone" name="phone"></label>
            </div>
            <div class="form-group">
             <label for="address">address:</label>
             <label class="ml-5">
              <input type="text" class="form-control  ml-5" id="address" placeholder=" address" name="address"></label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary text-white ml-5 px-3 mb-3">Add</button>
          </form>
        </div>
        <div class="col-md-3">

        </div>
      </div>
    </div>



  </body>
  </html>