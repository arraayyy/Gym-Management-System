<?php
    // session_start();

    include_once "connectdb.php";
    // function check_login($conn){

    //     if(isset($_SESSION['user_id'])){
    //         $id = $_SESSION['user_id'];
    //         $check = "select * from user where user_id = '$id' limit 1";

    //         $result = mysqli_query($conn, $check);

    //         if($result && mysqli_num_rows($result) > 0 ){
    //             $user_data = mysqli_fetch_assoc($result);
    //             return $user_data;
    //         }
    //     }

    //     header("Location: loginpage.php");
    //     die;
    // }
    // $user_data = check_login($conn);
    session_start();

    if(@$_SESSION['paymentAlert']){
        echo '<script>alert("'.$_SESSION['paymentAlert'].'")</script>';
        unset($_SESSION['paymentAlert']);
    }
?>

<!DOCTYPE HTML>  
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS and JS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

    <!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Gladiator Gym</title>
    <link rel="stylesheet" href="Xtra/temp/dashboard_stylesheet.css">
    <style>
	td{
		vertical-align: middle !important;
	}
    </style>
</head>
<body>
<div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 text-center">
                <h1>Gladiator Gym</h1>
                <hr>    
                    
                <h4><?php echo  "Admin" ?></h4>
                    
                
            </div>
            <a href="logout.php"><input type="button" class="btn btn-warning float-end" name="logout"  id="logout" value="Log Out"></a>
        </div>
    </div>
    <hr>
    <br>
    
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#customer" type="button" role="tab" aria-controls="customer" aria-selected="false">Customer</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="display-tab" data-bs-toggle="tab" data-bs-target="#customerValidity" type="button" role="tab" aria-controls="customerValidity" aria-selected="false">Customer Validity</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="plans-tab" data-bs-toggle="tab" data-bs-target="#plans" type="button" role="tab" aria-controls="plans" aria-selected="false">Package Plan</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="trainers-tab" data-bs-toggle="tab" data-bs-target="#trainers" type="button" role="tab" aria-controls="trainers" aria-selected="false">Trainers</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent" style="text-align:center">
        <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="plan-tab">
            <div class="container homeBox">
                <br>
                <h4>Welcome back Administrator<?php //echo ; ?>!</h4>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="container box1">
                                <i class="fas fa-users"></i>
                                <?php
                                    $activeCounter = 0;
                                        $active = "SELECT * FROM `customer`";
                                        $act = mysqli_query($conn,$active);        
                                        if(mysqli_num_rows($act)> 0){
                                            while($act_row = mysqli_fetch_assoc($act)){
                                                $activeCounter++;
                                            }
                                        }
                                ?>
                                <h5> <?php echo $activeCounter; ?> </h5>
                                <h5>Active Members</h5>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-xs-12">
                            <div class="container box2">
                                <i class="fas fa-th-list"></i>
                                <?php
                                    $membershipCounter = 0;
                                        $membership = "SELECT * FROM `registration`";
                                        $mem = mysqli_query($conn,$membership);        
                                        if(mysqli_num_rows($act)> 0){
                                            while($mem_row = mysqli_fetch_assoc($mem)){
                                                $membershipCounter++;
                                            }
                                        }
                                ?>
                                <h5><?php echo $membershipCounter; ?></h5>
                                <h5>Total Membership Plans</h5>
                            </div>
                        </div>
                        
                        <div class="col-sm-4 col-xs-12">
                            <div class="container box3">
                                <i class="fas fa-list"></i>
                                <?php
                                    $packageCounter = 0;
                                        $package = "SELECT * FROM `package_plan`";
                                        $pack = mysqli_query($conn,$package);        
                                        if(mysqli_num_rows($pack)> 0){
                                            while($pack_row = mysqli_fetch_assoc($pack)){
                                                $packageCounter++;
                                            }
                                        }
                                ?>
                                <h5> <?php echo $packageCounter++; ?></h5>
                                <h5>Total Packages</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="plan-tab">
            <div class="mainCard">
                <div class="p-3 card card-primary border border-0">
                    <!-- CARD HEADER -->
                    <div class="card-header bg-white border border-0">
                        <div class="row">
                            <div class="col-sm-10 col-12">
                                <h3 class="card-title text-left">Customers</h3>
                            </div>
                            <div class="col-sm-2 col-12">
                                <div class="card-tools float-end">    
                                    <a href="Xtra/temp/add_m.php" id="create_m" class="btn btm-sm btn-primary"><span class="fas fa-plus"> Add Members</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CARD BODY -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-12">
                            <div class="">
                                <table class="table table-hover table-bordered">
                                    <colgroup>
                                        <col width="5%">
                                        <col width="15%">
                                        <col width="20%">
                                        <col width="30%">
                                        <col width="15%">
                                        <col width="15%">
                                    </colgroup>
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Customer ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $display = "SELECT* FROM `customer`";  
                                        $dis = mysqli_query($conn,$display); 
                                        $count=1;         
                                        if(mysqli_num_rows($dis)> 0){ 
                                            while($dis_row = mysqli_fetch_assoc( $dis)){ 
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"><?php echo  $count?></td>
                                            <td class="text-center"><?php echo $dis_row['customer_id'];?></td>
                                            <td><?php echo $dis_row['customer_fname'].' '. $dis_row['customer_mname'].' '.$dis_row['customer_lname']; ?></td>
                                            <td><?php echo $dis_row['customer_email']; ?></td>
                                            <td><?php echo $dis_row['customer_contact']; ?></td>
                                            <td align="center">
                                                <div class="row">
                                                    <!-- <div class="col-md-3">
                                                        <a class="btn btn-sm btn-primary" href="view.php?id=<?php echo $dis_row['customer_id'] ?>"> View</a>
                                                    </div>      &nbsp; -->
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewmodal<?php echo $dis_row['customer_id'] ?>">View</button>
                                                    </div> &nbsp;
                                                    <div class="col-md-3">
                                                        <a class="btn btn-sm btn-warning" href="Xtra/temp/edit.php?id=<?php echo $dis_row['customer_id'] ?>">Edit</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal<?php echo $dis_row['customer_id'] ?>">Delete</button>
                                                    </div>

                                                    <!-- View Modal -->
                                                    <div class="modal fade" id="viewmodal<?php echo $dis_row['customer_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?php echo $dis_row['customer_id'] ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Customer Details</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">Name:</th>
                                                                                <td><?php echo $dis_row['customer_fname']. " ". $dis_row['customer_mname']. " ".$dis_row['customer_lname'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Gender:</th>
                                                                                <td><?php echo $dis_row['customer_gender'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Email:</th>
                                                                                <td><?php echo $dis_row['customer_email'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Contact:</th>
                                                                                <td><?php echo $dis_row['customer_contact'] ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">Address:</th>
                                                                                <td><?php echo $dis_row['customer_address'] ?></td>
                                                                            </tr>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                    <!-- <p>Name: <?php echo $dis_row['customer_fname']. " ". $dis_row['customer_mname']. " ".$dis_row['customer_lname'] ?></p>
                                                                    <p>Gender: <?php echo $dis_row['customer_gender'] ?></p>
                                                                    <p>Email: <?php echo $dis_row['customer_email'] ?></p>
                                                                    <p>Contact: <?php echo $dis_row['customer_contact'] ?></p>
                                                                    <p>Address: <?php echo $dis_row['customer_address'] ?></p>
                                                                    <p>Package Plan: N/A</p>
                                                                    <p>Trainer: N/A kay wala pas database </p> -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="modal<?php echo $dis_row['customer_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?php echo $dis_row['customer_id'] ?>" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this record?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a class="btn btn-danger" href="Xtra/temp/delete.php?id=<?php echo $dis_row['customer_id']?>" name="">Delete</a>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                


                                                </div>

                                            </td>
                                    </tbody>
                                    <?php
                                                $count++;
                                            }
                                        }
                                        
                                    ?>                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="customerValidity" role="tabpanel" aria-labelledby="plan-tab">
            <div class="container ">
                <div class="customValidHeader d-flex bd-highlight mb-3">
                    <h3 class="me-auto p-2 bd-highlight">Active Member List</h3>
                    <button 
                        type="button" 
                        class="btn btn-primary addTransacBtn"
                        data-bs-toggle="modal" 
                        data-bs-target="#addNewCusVal"><span class="fas fa-plus">
                        New
                    </button>
                </div>
                <div class="customValidBody">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Member ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $validity = "SELECT * FROM `registration` 
                                        INNER JOIN `customer` ON registration.customer_id = customer.customer_id 
                                        INNER JOIN `trainer` ON registration.trainer_id = trainer.trainer_id 
                                        INNER JOIN `package_plan` ON registration.package_plan_id = package_plan.package_plan_id;";
                                    $val = mysqli_query($conn,$validity);
                                    $count=1;         
                                    if(mysqli_num_rows($val)> 0){
                                        while($val_row = mysqli_fetch_assoc($val)){
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $count++; ?></th>
                                            <td><?php echo $val_row['customer_id']; ?></td>
                                            <td><?php echo ($val_row['customer_fname']." ".$val_row['customer_lname']); ?></td>
                                            <td><?php echo ($val_row['package_plan_type']); ?></td>                                         
                                            <td>
                                                <?php 
                                                    echo ($val_row['status'] == 1) ? 
                                                        '<span class="customerValidityStatus1">Active</span' : 
                                                        '<span class="customerValidityStatus2">Expired</span'; 
                                                ?>
                                                </td>
                                            <td>
                                                <button 
                                                    type="button" 
                                                    class="btn btn-outline-primary "
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#viewCusVal"
                                                    id="<?php echo $val_row['reg_id']; ?>"
                                                    data-memberId="<?php echo $val_row['customer_id']; ?>"
                                                    data-memberName="<?php echo ($val_row['customer_fname']." ".$val_row['customer_lname']); ?>"
                                                    data-status="<?php echo $val_row['status']; ?>"
                                                    data-plan="<?php echo $val_row['package_plan_type']; ?>"
                                                    data-planFee="<?php echo $val_row['package_plan_amount']; ?>"
                                                    data-trainer="<?php echo $val_row['trainer_name']; ?>"
                                                    data-trainerFee="<?php echo $val_row['trainer_rate']; ?>"
                                                    onclick="viewFunc(id)"
                                                    >
                                                    View
                                                </button>
                                                    
                                                <button 
                                                    type="button" 
                                                    id="<?php echo $val_row['reg_id']; ?>"
                                                    class="btn btn-outline-danger"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#delCusVal"
                                                    data-id="<?php echo $val_row['reg_id']; ?>"
                                                    onclick="delFunc(id)">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="plans" role="tabpanel" aria-labelledby="plan-tab">
        
            <div class="card border border-0">
                <div class="card-body ">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addPackagePlanModal"><span class="fas fa-plus">
                    Add Package Plan
                    </button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card border border-0">
                    <div class="card-header bg-white border border-0">
                                <b class="h2 float-left">Package Plan List</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <colgroup>
                                <col width="5%">
                                <col width="20%">
                                <col width="25%">
                                <col width="20%">
                                <col width="20%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Package Plans</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    $package = $conn->query("SELECT * FROM package_plan ORDER BY package_plan_id ASC");
                                    while($row=$package->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td>
                                    <p>Package Plan: <b><?php echo $row['package_plan_type'] ?></b></p>
                                    </td>
                                    <td>
                                        <p>Description: <small><b><?php echo $row['package_plan_desc'] ?></b></small></p>
                                    </td>
                                    <td class="text-center">
                                        <b>Php <?php echo number_format($row['package_plan_amount'],2) ?></b>
                                    </td>
                                    <td class="text-center">
                                        <a href="editpackageplan.php?editpp=<?php echo $row['package_plan_id']; ?>">
                                            <input type="button" class="btn btn-primary" name="editpp"  id="editpp"  value="Edit" >
                                        </a>  
                                        <a href="deletepackageplanconfirmation.php?deletepp=<?php echo $row['package_plan_id']; ?>">
                                            <input type="button" class="btn btn-danger" name="deletepp"  id="deletepp"  value="Delete">
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>	    
        <div class="tab-pane fade" id="trainers" role="tabpanel" aria-labelledby="trainers-tab">
            <br>
            <div class="card border border-0">
                <div class="card-body">
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addTrainerModal"><span class="fas fa-plus">
                    Add Trainer
                    </button>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border border-0">
                            <div class="card-header bg-white border border-0">
                                <b class="h2 float-left">List of Trainers</b>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Information</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $x = 1;
                                        $trainer = $conn->query("SELECT * FROM trainer ORDER BY trainer_id ASC");
                                        while($row=$trainer->fetch_assoc()):
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $x++ ?></td>
                                            <td class="">
                                            <p><i class="fa fa-user"></i> <b><?php echo $row['trainer_name'] ?></b></p>
                                            <p><small><i class="fa fa-at"></i> <b><?php echo $row['trainer_email'] ?></b></small></p>
                                            <p><small><i class="fa fa-phone-square-alt"></i> <b><?php echo $row['trainer_contact'] ?></b></small></p>
                                            <p><small><i class="fa fa-money-bill"></i> <b>Php <?php echo number_format($row['trainer_rate'],2) ?></b></small></p>
                                            </td>
                                            <td class="text-center">
                                                <a href="edittrainer.php?edittrainer=<?php echo $row['trainer_id']; ?>">
                                                    <input type="button" class="btn btn-primary" name="edittrainer"  id="edittrainer"  value="Edit" >
                                                </a>  
                                                <a href="deletetrainerconfirmation.php?deletetrainer=<?php echo $row['trainer_id']; ?>">
                                                    <input type="button" class="btn btn-danger" name="deletetrainer"  id="deletetrainer"  value="Delete">
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <hr>                                   
    </div>
    

</div>
<script>
    function viewFunc(id){
        const btn = document.getElementById(id);
        const modalId = btn.getAttribute('id'); //reg_id
        const memberId = btn.getAttribute('data-memberId'); //cutomer_id
        const memberName = btn.getAttribute('data-memberName');
        const plan = btn.getAttribute('data-plan');
        const planFee = btn.getAttribute('data-planFee');
        const trainer = btn.getAttribute('data-trainer');
        const trainerFee = btn.getAttribute('data-trainerFee');
        const status = btn.getAttribute('data-status');

        sessionStorage.setItem("modalId", modalId);
        sessionStorage.setItem("memberId", memberId);
        sessionStorage.setItem("memberName", memberName);
        sessionStorage.setItem("plan", plan);
        sessionStorage.setItem("planFee", planFee);
        sessionStorage.setItem("trainer", trainer);
        sessionStorage.setItem("trainerFee", trainerFee);

        document.getElementById("rowModalId").value = modalId;
        document.getElementById("updateId").value = modalId;
        document.getElementById("modalId").innerHTML = memberId;
        document.getElementById("modalName").innerHTML = memberName;
        document.getElementById("modalPlan").innerHTML = plan;
        document.getElementById("modalTrainer").innerHTML = trainer;
        document.getElementById("modalPlanFee").innerHTML = planFee;
        document.getElementById("modalTrainerFee").innerHTML = trainerFee;
        document.getElementById("modalTrainerMonthlyPayable").innerHTML = parseInt(planFee)+parseInt(trainerFee);
        document.getElementById("updateStatus").value = status;

        document.getElementById("paymentPackagePlanFee").innerHTML = "Php. " + planFee + ".00";
        document.getElementById("paymentPackagePlanFeeInput").value = parseInt(planFee);
        
        document.getElementById("paymentTrainerFee").innerHTML = "Php. " + trainerFee + ".00";
        document.getElementById("paymentTrainerFeeInput").value = parseInt(trainerFee);

        document.getElementById("totalPayable").innerHTML = "Php. " + (parseInt(planFee)+parseInt(trainerFee)) + ".00";
        document.getElementById("paymentTotalPayable").value = (parseInt(planFee)+parseInt(trainerFee));
    }

    function delFunc(id){
        const btn = document.getElementById(id);
        const modalId = btn.getAttribute('id'); //reg_id

        document.getElementById("delCustomVal").value = modalId;
    }

    function closemodal(){
        $('.modal').modal('hide') // closes all active pop ups.
        $('.modal-backdrop').remove() // removes the grey overlay.
    }

    $(document).on("click", "#open-viewDialog", function () {
        // var myBookId = $(this).data('id');
        var ModalId = $(this).data('modalId');
        // console.log($(this).data('modalId'));
        // $(".modal-body #rowModalId").val( ModalId );
    });

    function paymentTable(){
        console.log(sessionStorage.getItem("modalId", modalId));
    }
    
</script>
<?php include('addpackageplanmodal.php'); ?>
<?php include('addtrainermodal.php'); ?>
</body>

<!-- Add Cutomer Validity Modal -->
<div class="modal fade" id="addNewCusVal" tabindex="-1" aria-labelledby="addNewCusVal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+ New Membership Plan </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="sql_CustomerValidity.php" method="post">
            <div class="mb-3">
                <label for="addNewCusVal_member" class="form-label">Member</label>
                <select class="form-select" id="addNewCusVal_member" name="addNewCusVal_member"  required>
                    <option value="none" selected disabled>Select Customer...</option>
                <?php
                    $customer = "SELECT * FROM `customer`";
                    $cus = mysqli_query($conn,$customer);        
                    if(mysqli_num_rows($cus)> 0){
                        while($cus_row = mysqli_fetch_assoc($cus)){
                ?>
                            <option value="<?php echo ($cus_row['customer_id']); ?>"><?php echo ($cus_row['customer_fname']." ".$cus_row['customer_lname']); ?></option>
                <?php 
                        }
                    }
                ?>
                    </select>
            </div>
            <div class="mb-3">
                <label for="addNewCusVal_package" class="form-label">Package</label>
                <select class="form-select" id="addNewCusVal_package" name="addNewCusVal_package"  required>
                    <option value="none" selected disabled>Select Package...</option>
                <?php
                    $customer = "SELECT * FROM `package_plan`";
                    $cus = mysqli_query($conn,$customer);        
                    if(mysqli_num_rows($cus)> 0){
                        while($cus_row = mysqli_fetch_assoc($cus)){
                ?>
                            <option value="<?php echo $cus_row['package_plan_id']; ?>"><?php echo $cus_row['package_plan_type']; ?></option>
                <?php 
                        }
                    }
                ?>
                    </select>
            </div>
            <div class="mb-3">
                <label for="addNewCusVal_trainer" class="form-label">Trainer</label>
                <select class="form-select" id="addNewCusVal_trainer" name="addNewCusVal_trainer"  required>
                    <option value="none" selected disabled>Select Trainer...</option>
                <?php
                    $customer = "SELECT * FROM `trainer`";
                    $cus = mysqli_query($conn,$customer);        
                    if(mysqli_num_rows($cus)> 0){
                        while($cus_row = mysqli_fetch_assoc($cus)){
                ?>
                            <option value="<?php echo $cus_row['trainer_id']; ?>"><?php echo $cus_row['trainer_name']; ?></option>
                <?php 
                        }
                    }
                ?>
                    </select>
            </div>
            <div class="mb-3">
                <label for="addNewCusVal_startDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="addNewCusVal_startDate" id="addNewCusVal_startDate">
            </div>
            <div class="mb-3">
                <label for="addNewCusVal_endDate" class="form-label">End Date</label>
                <input type="date" class="form-control" name="addNewCusVal_endDate" id="addNewCusVal_endDate">
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addNewCusValBtn" class="btn btn-primary">Add</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- View Cutomer Validity Modal -->
<div class="modal fade" id="viewCusVal" tabindex="-1" aria-labelledby="viewCusValLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-address-card mr-2"></i> Member Plan Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="rowModalId" id="rowModalId" value=""/>
        <p>Member ID: <b id="modalId"></b></p>
        <p>Name: <b id="modalName"></b></p>
        <p>Plan: <b id="modalPlan"></b></p>
        <p>Trainer: <b id="modalTrainer"></b></p>
        <hr class="my-3">
        <p>Plan Membership Fee: <b id="modalPlanFee"></b></p>
        <p>Trainer Fee: <b id="modalTrainerFee"></b></p>
        <p>Monthly Payable: <b id="modalTrainerMonthlyPayable"></b></p>
      </div>
      <div class="modal-footer">
        <form action="sql_CustomerValidity.php" method="post">
            <input type="hidden" name="updateId" id="updateId" value=""/>
            <input type="hidden" name="updateStatus" id="updateStatus" value=""/>
            <button type="submit" name="updatePlan" id="updatePlan" class="btn btn-primary">Update Plan</button>
        </form>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-bs-toggle="modal" data-bs-target="#paymentModal" onclick="paymentTable()">Payment</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Cutomer Validity Modal -->
<div class="modal fade" id="delCusVal" tabindex="-1" aria-labelledby="delCusValLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE CUSTOMER VALIDITY</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="sql_CustomerValidity.php" method="post">
        <div class="modal-body">
            <h6>Are you sure you want to delete? </h6>
            <input type="hidden" id="delCustomVal" name="delCustomVal" value="" />
        </div>
        <div class="modal-footer">
            <button type="submit" name="delCustomValBtn" id="delCustomValBtn" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PAYMENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick=closemodal()></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="">
                <form action="sql_Payment.php" method="post">
                    <h6><b>New Payment</b></h6>
                    <div class="mb-3">
                        <!-- <span class="d-flex justify-content-between"><p>Plan Membership Fee:</p><p><b>Php. 1000.00</b></p></span> -->
                        <input type="hidden" id="rowModalId" name="rowModalId" value="">
                        <span class="d-flex justify-content-between"><p>Package Plan Amount:</p><p><b id="paymentPackagePlanFee"></b></p></span>
                        <input type="hidden" id="paymentPackagePlanFeeInput" name="paymentPackagePlanFeeInput" value="">
                        <span class="d-flex justify-content-between"><p>Trainer Fee:</p><p><b id="paymentTrainerFee"></b></p></span>
                        <input type="hidden" id="paymentTrainerFeeInput" name="paymentTrainerFeeInput" value="">
                    </div>
                    <div class="mb2">
                        <span class="d-flex justify-content-between"><p>Amount Payable:</p><p><b id="totalPayable"></b></p></span>
                        <input type="hidden" id="paymentTotalPayable" name="paymentTotalPayable" value="">
                    </div>
                    <div class="mb-3">
                        <label for="payment_amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="payment_amount" name="payment_amount" required>
                    </div>
                    <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                        <select class="form-select" aria-label="Default select example" id="payment_method" name="payment_method">
                            <option selected>Open this select mode of payment</option>
                            <option value="1">Bank Transfer: BPI</option>
                            <option value="2">Bank Transfer: BDO</option>
                            <option value="3">Gcash</option>
                            <option value="4">Pay Physically</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="payment_remarks" class="form-label">Remarks</label>
                        <div class="form-floating">
                            <textarea class="form-control" id="payment_remarks" name="payment_remarks" required></textarea>
                        </div>
                    </div>
                    <button type="submit" name="submitPayment"class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick=closemodal()>Close</button>
        
      </div>
    </div>
  </div>
  
</div>
</html>