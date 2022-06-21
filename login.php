<?php
    session_start();

    include("connectdb.php");


        $uname = $_POST['username'];
        $pword = $_POST['password'];

        if(!empty($uname) && !empty($pword)){  

            $query = "SELECT * FROM `user` WHERE `user_username` = '$uname' limit 1"; 
            
            $result = mysqli_query($conn, $query); 
            echo $query;

            if($result){  
                if(mysqli_num_rows($result) > 0 ){ 
                    $user_data = mysqli_fetch_assoc($result); 
                    
                    if($user_data['user_password'] === $pword){  
                        $_SESSION['user_id'] = $user_data['user_id'];  
                        if($user_data['user_type'] === '1'){  
                            header("Location: index.php"); 
                            die;
                        }
    
                    }
                }
            }
 
            echo '<script>alert("Incorrect Username or Password")</script>';
            header("location: loginpage.php");
        } else {
            echo '<script>alert("Please Enter Valid Information")</script>';
        }

?>
