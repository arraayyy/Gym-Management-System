<?php
    include 'connectdb.php';

    if(isset($_POST['addNewCusValBtn'])){
        $member = $_POST['addNewCusVal_member'];
        $package = $_POST['addNewCusVal_package'];
        $trainer = $_POST['addNewCusVal_trainer'];
        $sDate = $_POST['addNewCusVal_startDate'];
        $eDate = $_POST['addNewCusVal_endDate'];

        // echo ($member." ".$package." ".$trainer);

        $query = "INSERT INTO `registration`(`customer_id`, `package_plan_id`, `trainer_id`, `start_date`, `end_date`, `status`) 
        VALUES ('$member','$package','$trainer','$sDate','$eDate','1')";
        $result = mysqli_query($conn, $query);   
        
        if($result){
            echo '<script>alert("Record Saved Successfully");</script>';
            header("Location: index.php");
        }
        else{
            echo '<script>alert("Failed to Save Record");</script>';
        }
    }

    if(isset($_POST['delCustomValBtn'])){
        $reg_id = $_POST['delCustomVal'];
        // echo $reg_id;

        
        $query = "DELETE FROM `registration` WHERE `reg_id` = $reg_id";
        $result = mysqli_query($conn, $query);   
        
        if($result){
            echo '<script>alert("Record Deleted Successfully");</script>';
            header("Location: index.php");
        }
        else{
            echo '<script>alert("Failed to Save Record");</script>';
        }
    }

    if(isset($_POST['updatePlan'])){
        $reg_id = $_POST['updateId'];
        $status = $_POST['updateStatus'];
        // echo $status;

        if($status == 1){
            $status = 0;
        }
        else{
            $status = 1;
        }

        
        $query = "UPDATE `registration` SET `status`='$status' WHERE `reg_id` = $reg_id";
        $result = mysqli_query($conn, $query);   
        
        if($result){
            echo '<script>alert("Record Deleted Successfully");</script>';
            header("Location: index.php");
        }
        else{
            echo '<script>alert("Failed to Save Record");</script>';
        }
    }


?>