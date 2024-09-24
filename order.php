<?php
session_start();
isset($_SESSION['messag']);
require_once("conection.php");


    if (isset($_POST['firtsnam']) && isset($_POST['lastnam']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['orderd'])
        && isset($_POST['qunttity']) && isset($_POST['adressed']) && isset($_POST['County']) && isset($_POST['City']) && isset($_POST['bulding'])
        && isset($_POST['message'])) {
        
        // Retrieve and sanitize input
        $firstname = htmlspecialchars($_POST['firtsnam']);
        $lastname = htmlspecialchars($_POST['lastnam']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['contact']);
        $order = htmlspecialchars($_POST['orderd']);
        $quantity = htmlspecialchars($_POST['qunttity']);
        $address = htmlspecialchars($_POST['adressed']);
        $county = htmlspecialchars($_POST['County']);
        $city = htmlspecialchars($_POST['City']);
        $building = htmlspecialchars($_POST['bulding']);
        $message = htmlspecialchars($_POST['message']);

        // Prepare SQL statement
        
        

        try {
            $stmt = $conn->prepare("INSERT INTO Food(First_name, Last_name, Email, Contact, Order_placed, Quantity, Addres, County, City, Street_building, More_info) 
                 VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_Param('sssisisssss', $firstname,$lastname,$email,$telephone,$order,$quantity,$address,$county,$city,$building,$message);
            $stmt->execute();
            if($stmt->execute()){
                header("Location: index.html?successmessage=Your Order have been received successfully! You will receive it in the next 2 hours from now.");
                exit();
            };
            
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        echo 'Missing required fields.';
    }

?>
