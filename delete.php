<?php
require 'db.php';
session_start();
$id = $_GET['deleteid'];
$sql = "SELECT * FROM contact_detail WHERE id = '$id'  AND user_id = ".$_SESSION['contact_id'];
$check = $connection->query($sql);
if($check->num_rows == 1){
  $query = "DELETE FROM contact_detail WHERE id = '$id'  AND user_id = ".$_SESSION['contact_id'];
  $result = $connection->query($query);
  header('Location:view_all.php');
}
else
{
  echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> User Not Delete</div>'; 
}
?>