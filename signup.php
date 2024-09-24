<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
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
          <div class="wrapform">
            <form action="" method="post"  class="bg-dark p-2 mt-5" >
                <label id="lab">
                    Regester Here   
                </label>
                <?php  if(isset($_GET['error'])) {?>
                        <div class="mess"> <?php echo $_GET['error']?></div>
                    <?php }elseif(isset($_GET['success'])) {?> 
                        <div class="mess"> <?php echo $_GET['success']?></div>
                <?php } ?>
        

                <div class="form-floating">
                    <input type="text" placeholder="name" name="name" id="fna" class="form-control" required>
                    <label for="fna" class="form-label">First Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="lname" id="last" placeholder="lastnam" class="form-control" required>
                    <label for="last" class="form-label">Last name</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="usernam" id="user" placeholder="usnam" class="form-control" required>
                    <label for="user" class="form-label">User name</label>
                </div>
                <div class="form-floating">
                    <input type="email" name="mail" id="ma" placeholder="ema" class="form-control" required>
                    <label for="email" class="form-label">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="pass" id="pasw" placeholder="password" class="form-control" required>
                    <label for="pass" class="form-label">Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="pass1" id="pasw1" placeholder="password" class="form-control" required>
                    <label for="pass1" class="form-label">Confirm Password</label>
                </div>
                
                <div class="butts">
                    <button class="btn btn-primary" type="submit">Regester</button>
                    <button class="btn btn-secondary"><a href="login.php" style="text-decoration: none; color:whitesmoke">Login</a></button>
                </div>
            </form>
          </div><!--form wrap-->
        </div><!--container--->

<?php
    require_once('conection.php');
    if(
        isset($_POST['name']) && isset($_POST['lname']) 
        && isset($_POST['usernam']) && isset($_POST['mail']) && 
        isset($_POST['pass']) && isset($_POST['pass1']))
    {
        $firstname = $_POST['name'];
        $lastname = $_POST['lname'];
        $username = $_POST['usernam'];
        $email = $_POST['mail'];
        $password = $_POST['pass'];
        $password1 = $_POST['pass1'];

    $checkUser = $conn->prepare(" SELECT Username FROM MembersInfo WHERE Username = ?; ");
    $checkUser->bind_param('s',$username);
    $checkUser->execute();
    $check_result = $checkUser->get_result();

    if($check_result->num_rows > 0){
        $row = $check_result->fetch_assoc();
        if($username === $row['Username']){
            header("Location: signup.php?error=Username already exist, try another one");
            exit();
        }
    } 
    else{
        $insertStatment = $conn->prepare(" INSERT INTO  MembersInfo(First_name,Last_name,Username,Email,Credentials) VALUES(?,?,?,?,?); ");
        $insertStatment->bind_param('sssss',$firstname,$lastname,$username,$email,$password);
        
        if($password === $password1){
            $insertStatment->execute();
            header("Location: signup.php?success=Your Account is created successifully. Login now");
            exit();
        }
        else{
            header("Location: signup.php?error=Password Mismatch");
            exit();
        }
    }
    $conn->close();
    }
?>

</div><!--container fluid--->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous">
</script>
</html>


