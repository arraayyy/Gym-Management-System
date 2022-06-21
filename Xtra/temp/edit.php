<?php
 include 'config.php';
 $id=$_GET['id'];

 if(isset($_POST['submit'])){
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $add= $_POST['address'];
    $age= $_POST['age'];
    $w= $_POST['weight'];
    $h= $_POST['height'];
    $bmi= $_POST['bmi'];
    $sex= $_POST['sex'];

    if(isset($_POST['healthOptions']) ){
        // $health= $_POST['healthOptions'];
        $he = $_POST['healthCondition'];
    }else{
        $he = "NULL";
    }

    $update= "UPDATE `customer` 
              SET `customer_fname`='$fname', `customer_lname`='$lname', `customer_mname`='$mname',`customer_email`='$email', `customer_contact`='$phone',
                  `customer_age`='$age', `customer_gender`='$sex', `customer_weight`='$w', `customer_height`='$h', `customer_bmi`='$bmi', `customer_health`='$he', `customer_address`='$add' 
              WHERE customer_id = '$id'";
    
    $edit = mysqli_query($conn,$update); // update

    
    if(!$edit){
        echo "ERROR CHANGES";
    }else{
        echo "<script> 
        alert('UPDATED SUCCESSFULLY!')
        window.location.replace('../../index.php');
        </script>";
    }
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet/less" type="text/css" href="cards.less">
    <script src="cards.less" type="text/javascript"></script>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0 auto;
        }
    </style>
    
    
</head>
<body>
    <?php
    
    $display = "SELECT * FROM `customer` WHERE `customer_id` = $id ";
    $displaying = mysqli_query($conn,$display); 
                    
    if(mysqli_num_rows($displaying)> 0){
        while($row = mysqli_fetch_assoc( $displaying)){

    ?>
    
        <div class="container">
            <div class="card bg-dark container text-white mt-3" style="width: 50rem;">
                <div class="card-header">
                    <h3 class="card-title">Personal Information</h3>
                </div>
                
                <form action="" method="POST" class="form px-3">
                    <div class="mt-3">

                        <!--- NAME --->
                        <div class="row">
                            <div class="col-md-5 mt-4">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $row['customer_fname']?>">
                            </div>

                            <div class="col-md-5 mt-4">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['customer_lname']?>">
                            </div>

                            <div class="col-md-2 mt-4">
                                <label for="lname">Middle Initial</label>
                                <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $row['customer_mname']?>">
                            </div>
                        </div>

                        <!--- EMAIL --->
                        <div class="row">
                            <div class="col-md-6 mt-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['customer_email']?>">
                            </div>

                            <!-- CONTACT NUMBER -->
                            <div class="col-md-6 mt-4">
                                <label for="phone">Contact Number</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $row['customer_contact']?>">
                            </div>
                        </div>

                        <div class="row">
                        <!--- ADDRESS --->
                            <div class="col-md-8 mt-4">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['customer_address']?>">
                            </div>

                            <div class="col-md-2 mt-4">
                                <label for="sex">Sex</label>
                                <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $row['customer_gender']?>"> 
                            </div>

                            <!--- AGE --->
                            <div class="col-md-2 mt-4">
                                <label for="age">Age</label>
                                <input type="number" class="form-control" id="age" name="age" value="<?php echo $row['customer_age']?>">
                            </div>
                        </div>

                        
                        <div class="row">
                        <!--- HEIGHT --->
                        <div class="col-md-3 mt-4">
                            <label for="height">Height</label>
                            <input type="text" class="form-control" id="height" name="height" placeholder="Meters" value="<?php echo $row['customer_height']?>">
                        </div>

                        <!--- WEIGHT --->
                        <div class="col-md-3 mt-4">
                            <label for="weight">Weight</label>
                            <input type="text" class="form-control" id="weight" name="weight" placeholder="Kilogram" value="<?php echo $row['customer_weight']?>">
                        </div>

                        <div class="col-md-3 mt-5">
                        <div class="">
                            <input type="button" id="btn" class="btn bg-light text-dark" onclick="BMI()" target="blank" value="BMI"/>
                      
                                BMI:
                                <span id="bmi" class="lead fw-bold"> <?php echo $row['customer_bmi']?></span>
                                <input type="hidden" id="bmi2" name="bmi">
                            </div>
                        </div>
                        <script>
                            function BMI() {
                                var height = document.getElementById("height").value;
                                var w = document.getElementById("weight").value;
                                var h = document.getElementById("height").value;

                                var bmi = w / (h * h);
                                var bmiDesc;

                                if(bmi < 18.5) {
                                    bmiDesc = "Underweight";
                                } else if(bmi >= 18.5 && bmi <= 24.9) {
                                    bmiDesc = "Normal";
                                } else if(bmi >= 25 && bmi <= 29.9) {
                                    bmiDesc = "Overweight";
                                } else if(bmi >= 30) {
                                    bmiDesc = "Obese";
                                }
                                document.getElementById("bmi").innerHTML = bmiDesc;
                                document.getElementById("bmi2").value = bmiDesc;
                            }
                        </script>
                    </div>
                        
                        <div class="container">
                            <form action="">
                                <p class="fs-6 mt-4">Do you have any health conditions?</p>
                                
                                <div class="form-check form-check-inline mb-4">
                                    <input class="form-check-input" type="checkbox" onclick="checkMe(0)" name="healthOptions" id="yes" >
                                    <label class="form-check-label" for="yes">Yes</label>
                                </div>

                                <!-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" onclick="checkMe(1)" name="healthOptions" id="no" value="0">
                                    <label class="form-check-label" for="no">No</label>
                                </div> -->

                                <div class="checked" id="conditions" style="display:none;">
                                    <p>If yes, please write down below your condition</p>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="healthCondition" name="healthCondition" value="<?php echo $row['customer_health']?>">
                                    </div>
                                </div> 
                            
                            </form>
                        </div>

                        <script>
                            function checkMe(x) {
                                if(x == 0) {
                                    document.getElementById('conditions').style.display = "block";
                                } else {
                                    document.getElementById('conditions').style.display = "none";
                                    
                                }
                                return;
                            }
                        </script>
                        
                        <!-- SUBMIT BUTTON -->
                        <div class="container">
                            <div class="row p-4 text-center">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Change">
                                    <a href="../../index.php"><input type="button" class="btn btn-secondary" name="cancel" value="Cancel"></a>
                                </div>
                            </div>
                        </div>
                      
                      
                    </div>
                </form>
            </div>
        </div>
    <?php
        }
    }
    ?>

</body>
</html>