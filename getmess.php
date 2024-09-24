<?php
session_start();
if(isset($_SESSION['messag'])){
    echo $_SESSION['messag'];
    
}else{
    echo "Going to school";
}
?>