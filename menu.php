<?php 


session_start();
require 'db.php';
$sql = "SELECT * FROM users where id = ".$_SESSION['contact_id'];
$result=$connection->query($sql);
if ($result->num_rows > 0) {
    $count=$result->num_rows;
}
else{
  $count=0;
}


 ?>
<nav class="navbar navbar-expand-sm bg-dark">
 <a class="text-white" href="#"><b>Phonebook Directory</b></a>
 <a class="navbar-brand text-white ml-auto" href="home page.php"><em>Home</em></a>
 <ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link text-white ml-4" href="add user.php">AddNew</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white ml-4" href="view_all.php">ViewAll <span class="text-dark bg-light px-2" style="border-radius: 5px;"><?php echo $count; ?></span></a>
  </li>
</ul>
<a class="navbar-brand text-white ml-4" href="view.php">view</a>
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link text-white ml-4" href="Change Passwords.php">ChangePasword</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white ml-4" href="logout.php">Logout</a>
  </li>
</ul>
</nav>
