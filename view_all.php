<!DOCTYPE html>
<html>
<head>
	<title>view All</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="htt
  ps://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
  <?php
	  require 'menu.php'; 
   require 'db.php'; 

  $sql = "SELECT * FROM contact_detail WHERE user_id = ".$_SESSION['contact_id'];
    $result = $connection->query($sql);
    // var_dump($result); exit;
    
   ?>
<body class="bg-secondary">
		<div class="container text-center">
      <h3 class="mt-5">view all contact</h3>
		<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2">
		</div>	
		<div class="col-lg-8 col-md-8 col-sm-8">
	   <table class="table table-bordered table-auto mt-5">

    <tr>
      <th>S.no</th>
      <th>name</th>
      <th>designation</th>
      <th>phone</th>
      <th>address</th>
      <th>action</th>
    </tr>

  <?php if ($result->num_rows >  0) {
    $count = 1;
    while($row = $result->fetch_assoc()){
    ?>
    <tr>
      <th><?php echo $count; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['designation']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td> <a href="edit_user.php?editid=<?php echo $row["id"]; ?>" class="text-decoration-none text-white mr-2">Edit </a> |  <a href="delete.php?deleteid=<?php echo $row["id"]; ?>" class="text-decoration-none text-white ml-2" onclick="return confirm('Are you sure do you wan\'t to delete the user?')">Delete </a></td>   
    </tr>
  <?php $count++; }
    } else {?>
  <tr>
    <td colspan="6" class="text-center text-white"> No Record Found</td>
  </tr>
<?php }?>
</table>
		</div>	
		<div class="col-lg-2 col-md-2 col-sm-2">
		</div>	
		</div>
		</div>
</body>
</html>