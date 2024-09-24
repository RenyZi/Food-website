<?php
session_start();
isset($_SESSION['username']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Website Update Personal Infor</title>

    <!--bootstrap-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="mypage.css">

    <style>
        body,*{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: whitesmoke;
            
        }
        #mainformm{
            width: 400px;
            margin: 1rem auto;
            position: relative;

        }
        #mainformm input{
            cursor: pointer;
        }
        #mainformm label{
            cursor: pointer;
            margin-top: 1rem;

        }
        
    </style>

</head>
<body class="bg-dark">
    <div class="mainform">
        <form action="" method="POST" id="mainformm">
        <h2><label>Update your preferd data!</label></h2>
        <label for="nam" class="label-control">First Name</label>
        <input type="text" id="nam" class="form-control" name="firtsnam" placeholder="optional">
        <label for="lname" class="label-control">Last Name</label>
        <input type="text" class="form-control" name="lastname" placeholder="optional" id="lname">
        <label for="mail" class="label-control">Email</label>
        <input type="email" class="form-control" name="email" id="mail" placeholder="optional" id="mail">
        <br>
        <button class="btn btn-primary" type="submit">Update</button>
        </form> 
    </div>
</body>
<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous">
</script>
</html>


<?php require_once("conection.php");
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

$new_firstname = isset($_POST['firtsnam']) ? $_POST['firtsnam'] : null;
$new_lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
$new_email = isset($_POST['email']) ? $_POST['email'] : null;

// Initialize an empty array to store update parts
$update_fields = [];

// Add each field to the array only if it is set
if (!empty($new_firstname)) {
    $update_fields[] = "First_name = '$new_firstname'";
}
if (!empty($new_lastname)) {
    $update_fields[] = "Last_name = '$new_lastname'";
}
if (!empty($new_email)) {
    $update_fields[] = "Email = '$new_email'";
}


if (!empty($update_fields)) {
    // Join the fields to create the SET part of the SQL query
    $set_clause = implode(", ", $update_fields);

    // Create the SQL query dynamically
    $sql = "UPDATE Membersinfo SET $set_clause WHERE Username = ?";
    $prep = $conn->prepare($sql);
    $prep->bind_param('s',$username);
    $prep->execute();

    // Execute the query
    if ($prep->execute()) {
        header("Location: mypage.php?messagesucc=Your personal data have been updated successfully!");
        exit();
    } else {
        echo "Error updating record: ";
}
}



?>









