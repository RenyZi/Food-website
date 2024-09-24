<?php
session_start();
isset($_SESSION['data']);
?>

<?php


foreach($_POST as $data){  
 $_SESSION['data'] = $data;
    
} 

$arr_remov = [
    isset($_SESSION['remove']) ? $_SESSION['remove'] : 0,
    isset($_SESSION['remove1']) ? $_SESSION['remove1'] : 0,
    isset($_SESSION['remove2']) ? $_SESSION['remove2'] : 0,
    isset($_SESSION['remove3']) ? $_SESSION['remove3'] : 0,
    isset($_SESSION['remove4']) ? $_SESSION['remove4'] : 0,
    isset($_SESSION['remove5']) ? $_SESSION['remove5'] : 0,
    isset($_SESSION['remove6']) ? $_SESSION['remove6'] : 0,
    isset($_SESSION['remove7']) ? $_SESSION['remove7'] : 0,
    isset($_SESSION['remove8']) ? $_SESSION['remove8'] : 0,
];

$totai_remove = 0;

foreach($arr_remov as $value){
    if($value > 0){
       $totai_remove += $value;
    }
    isset($_SESSION['removed']);
    $_SESSION['removed'] = $totai_remove;
}


if(isset($_SESSION['removed'])){
    if(isset($_SESSION['data']) > 0){
        $diff = $_SESSION['data'] - $_SESSION['removed'];
        echo $diff;
    }
}else{
    echo "Sorry";
}






?>