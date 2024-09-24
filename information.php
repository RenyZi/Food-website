<?php 
session_start();
isset($_SESSION['username']);

?>

<?php require_once('conection.php');

    $fetchdetails = $conn->prepare(" SELECT * FROM MembersInfo WHERE Username = ?; ");
    $fetchdetails->bind_param('s',$_SESSION['username']);
    $fetchdetails->execute();
    $result = $fetchdetails->get_result();


    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        if($data['Username'] === $_SESSION['username']){
            $information = "<ul style='font-weight:bolder;'>".
                                "<li>".'First Name: '.$data['First_name']."</li>".
                                "<li>".'Last Name: '.$data['Last_name']."</li>".
                                "<li>".'Username: '.$data['Username']."</li>".
                                "<li>".'Email: '.$data['Email']."</li>".
                            "</ul>";
                        
          echo $information;
    
        }
        
        
    }else{
        echo"No data found";
    }



?>