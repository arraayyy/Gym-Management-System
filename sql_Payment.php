<?php
    include 'connectdb.php';
    session_start();

    if(isset($_POST['submitPayment'])){
        $reg_id = $_POST['rowModalId'];
        $packagePlanFee = $_POST['paymentPackagePlanFeeInput'];
        $trainerFee = $_POST['paymentTrainerFeeInput'];
        $totalpayable = ($_POST['paymentPackagePlanFeeInput']+$_POST['paymentTrainerFeeInput']);
        $payment = $_POST['payment_amount'];
        $remarks = $_POST['payment_remarks'];
        $date = date('y-m-d h:i:s');
        // echo $date;

        if($payment > $totalpayable){
            $_SESSION['paymentAlert'] = "You Paid More Than The said amount";
            header("Location: index.php");
        }
        else if($payment < $totalpayable){
            $_SESSION['paymentAlert'] = "You Paid Less Than The said amount";
            header("Location: index.php");
        }
        else{
            $query = "INSERT INTO `payment`(`reg_id`, `payment_amount`, `remarks`, `date_issued`) VALUES ('$reg_id','$payment','$remarks','$date')";
            $result = mysqli_query($conn, $query);   
            echo $query;
            if($result){
                echo '<script>alert("Record Saved Successfully");</script>';
                header("Location: index.php");
            }
            else{
                echo '<script>alert("Failed to Save Record");</script>';
            }

        }
    }


?>