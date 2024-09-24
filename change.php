<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food website</title>
     <!--bootstrap-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        :root{
            --bgcolor:  rgb(216, 142, 5);
            --textColor: whitesmoke;
            box-shadow: inset 20px 100px 170px rgba(0, 0, 0, 1),inset -20px -100px 170px rgba(0, 0, 0, 1);
        }
        .container-fluid{
            background-color: var(--bgcolor);
            color: var(--textColor);
            box-shadow: inset 20px 100px 170px rgba(0, 0, 0, 1),inset -20px -100px 170px rgba(0, 0, 0, 1);
            height: 100vh;
        }
        .container{
            display: flex;
            height: 80vh;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }
        form{
            width: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 2rem;
            border-radius: 0.4rem;
        }
        form label{
            cursor: pointer;
            font-weight: bolder;
        }
        form input{
            cursor: pointer;
        }
        form button{
            margin-top: 1rem;
        }
        .error{
            text-align: center;
            margin-top: 1rem;
            border-right: 1px solid whitesmoke;
            border-left: 1px solid whitesmoke;
            border-radius: 0.4rem;
            padding: 0 2rem;
        }
        .butdiv{
            display: flex;
            justify-content: end;
            
        }
        .butdiv #link{
            margin-right: 1rem;
        }
        .butdiv a{
            text-decoration: none;
            color: var(--textColor);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
                <form action="" method="post">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" name='mail' id="Email" required>
                    <div class="butdiv">
                    <button class="btn btn-primary" id="link">Next</button>
                    <button class="btn btn-secondary"><a href="login.php">Back</a></button>
                    </div>
                </form>
                    <?php if(isset($_GET['error'])) {?>
                    <div class="error"><?php echo $_GET['error'];?></div>
                    <?php }?>
                <?php
                require_once('conection.php');

                if(isset($_POST['mail'])){

                    function test($data){
                        $data = trim($data);
                        $data = htmlspecialchars($data);
                        $data = stripslashes($data);
                    }

                    test($_POST['mail']);

                    $email = $_POST['mail'];

                    $checkEmail = $conn->prepare(" SELECT Email FROM MembersInfo WHERE Email = ?; ");
                    $checkEmail->bind_param('s',$email);
                    $checkEmail->execute();
                    $result = $checkEmail->get_result();

                    if($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        if($row['Email'] === $email){
                            header("Location: update.php?message=Update your Information");
                            exit();
                        }
                    }
                    else{
                        header("Location: change.php?error=Email does not exist!!!");
                        exit();
                    }
                }
                
                
                
                
                
                ?>
        </div><!--container div-->
    </div><!--fluid div-->



</body>
<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous">
</script>

</html>