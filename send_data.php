<?php
session_start();
$rawdata = file_get_contents("php://input");
$arr_data = json_decode($rawdata,true);

$_SESSION['data_array'] = $arr_data;

?>