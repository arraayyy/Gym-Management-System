<?php
include 'config.php';


$id=$_GET['id'];

if(isset($id)){
    $delete = "DELETE FROM customer WHERE `customer_id` = $id ";

    $query = mysqli_query($conn,$delete);

    header('Location:../../index.php');
}


?>
