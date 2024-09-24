<?php
session_start();


foreach($_POST as $divids){

    switch($divids){
        case "remove1":
            $_SESSION['remove'] = 1;
            if (isset($_SESSION['id1']) && isset($_SESSION['price1'])) {
                unset($_SESSION['id1']);
                unset($_SESSION['price1']);

            }
            break;

        case 'remove2':
            $_SESSION['remove1'] = 1;
            if(isset($_SESSION['id2']) && isset($_SESSION['price2'])){
                unset($_SESSION['id2']);
                unset($_SESSION['price2']);   
            }
            break;

        case 'remove3':
            $_SESSION['remove2'] = 1;
            if(isset($_SESSION['id3']) && isset($_SESSION['price3'])){
                unset($_SESSION['id3']);
                unset($_SESSION['price3']);   
            }
            break;

        case 'remove4':
            $_SESSION['remove3'] = 1;
            if(isset($_SESSION['id4']) && isset($_SESSION['price4'])){
                unset($_SESSION['id4']);
                unset($_SESSION['price4']);   
            }
            break;

        case 'remove5':
            $_SESSION['remove4'] = 1;
            if(isset($_SESSION['id5']) && isset($_SESSION['price5'])){
                unset($_SESSION['id5']);
                unset($_SESSION['price5']);    
            }
            break;
            
        case 'remove6':
            $_SESSION['remove5'] = 1;
            if(isset($_SESSION['id6']) && isset($_SESSION['price6'])){
                unset($_SESSION['id6']);
                unset($_SESSION['price6']);    
            }
            break;

        case 'remove7':
            $_SESSION['remove6'] = 1;
            if(isset($_SESSION['id7']) && isset($_SESSION['price7'])){
                unset($_SESSION['id7']);
                unset($_SESSION['price7']);   
            }
            break;

        case 'remove8':
            $_SESSION['remove7'] = 1;
            if(isset($_SESSION['id8']) && isset($_SESSION['price8'])){
                unset($_SESSION['id8']);
                unset($_SESSION['price8']);    
            }
            break;
            
        case 'remove9':
            $_SESSION['remove8'] = 1;
            if(isset($_SESSION['id9']) && isset($_SESSION['price9'])){
                unset($_SESSION['id9']);
                unset($_SESSION['price9']);   
            }
            break;
    }
}


?>