<?php
session_start();

if(isset($_POST['recve']) && isset($_POST['county']) && isset($_POST['addrs']) && isset($_POST['contact'])){

    $_SESSION['receve'] = $_POST['recve'];
    $_SESSION['county'] = $_POST['county'];
    $_SESSION['locat'] = $_POST['addrs'];
    $_SESSION['fone'] = $_POST['contact'];   
    
    header("Location: index.html");
    exit();
}
if(isset($_SESSION['receve']) && isset($_SESSION['county']) && isset($_SESSION['locat']) && isset($_SESSION['fone'])){
    echo "<div style='border-top: 1px solid whitesmoke;'>";
    echo "<h3>"."Delivery Location"."</h3>";
    echo "Receiver Name: ".$_SESSION['receve']."<br>";
    echo "County: ".$_SESSION['county']."<br>";
    echo "Full address: ".$_SESSION['locat']."<br>";
    echo "Telephone: +254 ".$_SESSION['fone'];
    echo "</div>";
}



?>