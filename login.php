<?php 
session_start();
isset($_SESSION['username']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food website</title>
<link rel="stylesheet" href="login.css">
    <!--bootstrap-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container-fluid">
        <div class="container">
            <div class="content-form">
                
                <form action="" method="post" id="formlogin">
                    <label id="log">Login</label>
                    <?php if(isset($_GET['error'])){ ?>
                            <span class="error "><?php echo $_GET['error'];?></span>    
                    <?php }elseif(isset($_GET['messagesucc'])){?> 
                            <span class="error "><?php echo $_GET['messagesucc'];?></span> 
                    <?php }?>
                    
                    <div class="form-floating">
                        <input type="text" name="userna" id="use" placeholder="username" class="form-control">
                        <label for="use" class="form-label">User name</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" id="ps" placeholder="pass" class="form-control">
                        <label for="ps" class="form-label">Password</label>
                    </div>
                    <div class="butts">
                    <div class="butons">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button class="btn btn-primary" id="forget"><a href="change.php" style="color: whitesmoke; text-decoration:none">Forgot password?</a></button>
                    </div>
                    <span id="reg"><a href="signup.php">Don't have an account? Regester</a></span>
                    </div>
                </form>
            </div>
        </div>

        <!--php section-->
        <?php
            require_once('conection.php');
            $username = $password;

            if(isset($_POST['userna']) && isset($_POST['password'])){

                function checkinput($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                }

                $username = $_POST['userna'];
                $password = $_POST['password'];

                $_SESSION['username'] = $username;
                
                if(empty($username)){
                    header("Location: login.php?error=Username is required!");
                    exit();
                }elseif(empty($password)){
                    header("Location: login.php?error=Password is required!");
                    exit();
                }else{
                    $statment = $conn->prepare(" SELECT Username, Email, Credentials FROM MembersInfo WHERE Username = ? AND Credentials = ?; ");
                    $statment->bind_param('ss', $username,$password);
                    $statment->execute();
                    $statment_result = $statment->get_result();
                    
                    if($statment_result->num_rows > 0){
                        $row = $statment_result->fetch_assoc();
                        
                        if(($username === $row['Username']) && ($password === $row['Credentials'])){

                            header("Location: mypage.php?success=Welcome");
                            exit();
                        }                    
                    }
                    else{
                        header("Location: login.php?error=Wrong username or password! Try Again");
                    exit();
                    }
                }
                
                $conn->close();   
            }
            
        ?>

    </div><!--container fluid-->

    
</body>
<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous">
</script>
</html>