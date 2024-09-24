<?php
session_start();
?>


<?php   
class total{
    function total1(){
        $arr_price = array(
                            isset($_SESSION['price1']) ? $_SESSION['price1'] : 0,
                            isset($_SESSION['price2']) ? $_SESSION['price2'] : 0,
                            isset($_SESSION['price3']) ? $_SESSION['price3'] : 0,
                            isset($_SESSION['price4']) ? $_SESSION['price4'] : 0,
                            isset($_SESSION['price5']) ? $_SESSION['price5'] : 0,
                            isset($_SESSION['price6']) ? $_SESSION['price6'] : 0,
                            isset($_SESSION['price7']) ? $_SESSION['price7'] : 0,
                            isset($_SESSION['price8']) ? $_SESSION['price8'] : 0,
                            isset($_SESSION['price9']) ? $_SESSION['price9'] : 0,
                        );
        

        $summation = array_sum($arr_price);
        return $summation;
    }
}

$object = new total();    
echo "Total Ksh ".$object->total1();

?>