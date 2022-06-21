
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gladiator Fitness Gym</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="login.css">
    <style>
        .logo{
            width:6vw;
            margin:auto;
            border-radius:20px;
        }
    </style>
</head>
<body>
    <header>

        <div class="container">
            <form class="card mt-5 px-3 py-3 container bg-transparent" action="login.php" style="width: 25rem;" method="POST">
                <img src="../assets/glad.jpg" class="logo" alt="...">
                <br>
                <div class="card-header h4 text-center fw-bold">GLADIATOR FITNESS GYM</div>
                    <div class="row align-items-center">
                        <!---------- USERNAME ---------->
                        <div class="mt-4">
                            <label for="username">Username</label>
                            <input type="text" class="form-control mt-2" name="username" autocomplete="off" required>
                        </div>
                        <!---------- PASSWORD ---------->
                        <div class="mt-4">
                            <label for="passwordinput">Password</label>
                            <input type="password" class="form-control mt-2" name="password" autocomplete="off" required>
                        </div>
                        <!---------- LOGIN BUTTON ---------->
                    <div class="mt-4 text-center">
                        <button type ="submit" class="btn btn-light ">Login</button>
                    </div>
                </div>
            </form>
        </div>
                
             
    </header>
</body>
</html>