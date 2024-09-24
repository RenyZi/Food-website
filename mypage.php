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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--bootstrap-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="mypage.css">

</head>
<body class="bg-dark">

<div class="container-fluid bg-dark">
    <div class="mes" style="display: none;">
        <?php if(isset($_GET['messagesucc'])){?>
            <h5 id="meso"><?php echo $_GET['messagesucc'];?></h5>
            <?php }?>
        <?php if(isset($_GET['messfeds'])) {?>
            <h5 id="meso"><?php echo $_GET['messfeds'];?></h5>
        <?php }?>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="profile">
                <div class="wrappimage">
                    <div class="profimag">
                        <span id="small"></span>
                        <span id="big"></span>
                    </div><!--class profimag-->
                        <?php if(isset($_GET['success'])) {?>   
                        <div class="success"> <?php echo $_GET['success']." ". $_SESSION['username'];?> </div>
                        
                        <?php }?>
                </div><!--class wrapperimage-->
                <div class="links">
                 <button type="button" id="profbutt">My Profile</button>
                 <button type="button" id="profbuttout">
                    <a href="index.html" style="text-decoration: none;color:whitesmoke;">Log out</a></button>
                </div>
                
                <div class="info disaper">
                    <h4>Personal Information</h4>
                    <div class="infordata">

                    </div>
                    <div class="but">
                        <button class="btn btn-danger">Delete Account</button>
                        <button class="btn btn-primary"><a href="mypageupdat.php" style="text-decoration: none; color:whitesmoke">Update</a></button>
                        <button class="btn btn-secondary" id="back">Back</button>
                    </div>
                </div><!--class info-->
            </div><!--class profile-->
            <div class="content">
                <ul>
                    <li><button  id="orders" >My Orders</button></li> 
                    <li><button  id="order" > <i class="fa-solid fa-inbox"></i> Inbox</button></li>
                    <li><button  id="order"> <i class="fa-solid fa-address-book"></i> Contact Us</button></li>
                    <li><button  id="order" class="feeds"> <i class="fa-regular fa-comment"></i> Feed back </button></li>
                </ul>
            </div><!--class content-->
        </div><!--end of first column-->

        <div class="col-sm-9">      
            <h2>Dashboard</h2>
            <div class="orderdfood"></div>  
            <div class="locationDetails" style="margin:1rem 0;"></div>
            <div class="feedsform nonappera">
                <form action="feds.php" method="post" id="feeds">
                <h4><label>Enter your feedback/complaints below:</label></h4>
                    <label for="user" class="label-control">User Name</label>
                    <input type="text" class="form-control" name="usern" id="user">
                    <label for="email" class="label-control">Email</label>
                    <input type="email" class="form-control" name="mail" id="email">
                    <div class="tex">
                        <textarea name="feedback" placeholder="Your feedback..." id="fedsba"></textarea>
                    </div>
                    <div class="butgrop">
                    <button class="btn btn-primary" type="submit">Send Feedback</button>
                    <input class="btn btn-secondary" id="fedscancle" value="Back">
                    </div>
                </form>
            </div>
        </div><!--second column-->
    </div><!--row div-->
</div><!--fluid div-->

</body>

<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous">
</script>


<script src="mypage.js"></script>
</html>