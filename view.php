<!DOCTYPE html>
<html>
<head>
	<title>User profile</title>
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

  $sql = "SELECT * FROM users WHERE id =".$_SESSION['contact_id'];
      // var_dump($sql); exit;
    $result = $connection->query($sql);
     $row = $result->fetch_assoc();
   ?>
<body class="bg-secondary">

	

			<div class="text-primary mt-5 text-center"><h2>User Profile</h2></div>
		<div class="container">
		<div class="row">
		<div class="col-md-2">
		</div>	
		<div class="col-md-8">
			<table class="table table-bordered table-auto mt-5">
  <thead>
    <tr class="text-center">
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><a class="text-center text-white" href="edit_profile.php">Edit</a></td>
    </tr>
  </tbody>
</table>
		</div>	
		<div class="col-md-2">
			
		</div>	
		</div>
			
		</div>
	</body>
</html>