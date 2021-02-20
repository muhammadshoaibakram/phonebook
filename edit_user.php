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
$message = '';
if(isset($_POST['update'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $designation = $_POST['designation'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  if($name == ''  || $phone ==''  ){
   $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

 }
 else
 {
   $query = "UPDATE contact_detail SET name = '$name', designation =  '$designation', phone =  '$phone', address = '$address'WHERE id ='$id'";
   $result =$connection->query($query);
         // var_dump($result); exit;

   if($result){
    header("Location:view_all.php"); 
  } else {
   $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';   
 }
}
}

 $editid = $_GET['editid']; // GETTING ID FROM URL
   $query = "SELECT * FROM contact_detail WHERE id ='$editid' AND user_id = ".$_SESSION['contact_id'];
   $result = $connection->query($query);
   if ($result->num_rows == 1) {
    $row = $result->fetch_assoc(); 
   // var_dump($row); exit;
   }
   else
   {
     header('Location: view_all.php');
   }


?>

<body>
  <body class="bg-secondary">

    <div class="container">
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 text-center mt-5 border">
          <form action="<?php  echo $_SERVER['REQUEST_URI'] ?>" method="POST">
            <?php echo $message; ?>
            <div class="text-primary text-center mt-5 mb-5"><h3><em>Update User</h3></em></div>
            <div class="form-group">
              <label for="email">Name<span class="text-danger">*</span></label>
              <label class="ml-5"><input type="text" class="form-control ml-5"  id="name" placeholder=" Name" name="name" value="<?php echo $row['name'] ?>"></label>
              <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            </div>
            <div class="form-group">
              <label for="Dasidnation">Designation</label>
              <label class="ml-3"><input type="text" class="form-control ml-5" id="Dasidnation" placeholder=" Dasidnation" name="designation" value="<?php echo $row['designation'] ?>"></label>
            </div>

            <div class="form-group">
              <label for="phone">Phone<span class="text-danger">*</span></label>
              <label class="ml-5"><input type="text" class="form-control ml-5" placeholder=" Phone" name="phone" value="<?php echo $row['phone'] ?>"></label>
            </div>
            <div class="form-group">
             <label for="address">Address</label>
             <label class="ml-5"><input type="text" class="form-control  ml-5" placeholder=" Address" name="address" value="<?php echo $row['address'] ?>"></label>
           </div>
           <h3><button class="bg-primary text-white mr-5" type="submit" name="update" class="btn btn-button">Add</button></h3>


         </form>
       </div>
       <div class="col-md-3">

       </div>
     </div>
   </div>


 </body>
 </html>