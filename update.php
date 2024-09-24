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
            box-shadow: inset 20px 100px 170px rgba(0, 0, 0, 1),inset -20px -100px 170px rgba(0, 0, 0, 1);
            height: 100vh;
        }
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80vh;
            flex-direction: column;
        }
        form{
            width: 500px;
            padding: 2rem;
            border-radius: 1rem;
            border-top: 0.2rem solid #0076ff;
            border-bottom: 0.2rem solid #0076ff;
            height: 60vh;


        }
        form input{
            cursor: pointer;
            margin: 1rem 0;
        }
        #messo{
            color: var(--textColor);
            font-weight: bolder;
        }
    </style>
</head>
<body>
    
<div class="container-fluid">
    <div class="container">
        <form action="" method="post" class="bg-dark">
            <?php if(isset($_GET['message'])) {?>
            <label id="messo">
                <?php echo $_GET['message'];?>
            </label>

            <?php }?>
            <div class="form-floating">
                <input type="Email" class="form-control" name="mail" placeholder="pass" id="mai" required>
                <label for="mai" class="form-label">Email</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="passnew" placeholder="pass" id="uppas" required>
                <label for="upmail" class="form-label">New Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="passnew1" placeholder="pass1" id="uppas1" required>
                <label for="uppas1" class="form-label">Repeat Password</label>
            </div>

            <div class="butclos">
                <button class="btn btn-primary">Update</button>
                <button class="btn btn-secondary"><a href="change.php" style="color: whitesmoke; text-decoration:none;">Cancel</a></button>
             </div>
        </form>
        <div class="er">
            <?php if(isset($_GET['err'])){ echo $_GET['err'];}?>
        </div>
        <?php require_once('conection.php');
        
                if(isset($_POST['passnew']) && isset($_POST['passnew1']) && isset($_POST['mail'])){
                    $emal = $_POST['mail'];
                    $passnew = $_POST['passnew'];
                    $passconfirm = $_POST['passnew1'];

                    if($passnew === $passconfirm){
                        $updat = $conn->prepare(" UPDATE membersInfo SET Credentials = ? WHERE Email = ?; ");
                        $updat->bind_param('ss',$passnew,$emal);
                        $updat->execute();
                        if($updat->execute()){
                            header("Location: login.php?messagesucc=Your Information is successifully updated");
                            exit();
                        }
            
                    }else{
                        header("Location: update.php?message=Password did not match!");
                        exit();
                    }
                }
        
        
        ?>

    </div>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous">
</script>
</html>