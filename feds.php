<?php
require_once("conection.php");
if(isset($_POST['usern']) && isset($_POST['mail']) && isset($_POST['feedback'])){
    $user = $_POST['usern'];
    $mail = $_POST['mail'];
    $fedds = $_POST['feedback'];

    $check = $conn->prepare(" SELECT * FROM Feeds WHERE Username = ?; ");
    $check->bind_param('s',$user);
    $result = $check->get_result();

    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        if($user === $data['Username']){
            header("Location: mypage.php");
            exit();

        }
    }else{
    $insert = $conn->prepare(" INSERT INTO Feeds(Username,Email,Feedback) VALUES(?,?,?); ");
    $insert->bind_param('sss',$user,$mail,$fedds);
    $insert->execute();

    if($insert->execute()){
        header("Location: mypage.php?messfeds=Thanks for your feedback, We will review it and do the needful!");
        exit();
    }
    }
    
}


?>