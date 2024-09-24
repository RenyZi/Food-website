<?php
session_start();
isset($_SESSION['id']);

?>

<?php
class foodstyp{
    private $conn;

    function __construct($host,$user,$passw,$dbase)
    {
        $this->conn = new mysqli($host,$user,$passw,$dbase);
        if($this->conn->connect_error){
            die("Connection failed");
        }
    }


    function data($id){
        $stm = $this->conn->prepare(" SELECT * FROM foodvarities WHERE ID = ?; ");
        $stm->bind_param('i',$id);
        $stm->execute();
        $result = $stm->get_result();

        if($result->num_rows > 0){
            $data = $result->fetch_assoc();  
            $id = $data['ID'];
            return $data['Food_type']."<br>". $data['Food_description'];
            
        }
    }

    function __destruct()
    {
        $this->conn->close();
    }
}
// end of class

//creating the object
$host = 'sql306.infinityfree.com';
$username = 'if0_37341242';
$password = 'yTqSkOFHdiURrXQ';
$database = 'if0_37341242_Foodwebsite';


$object = new foodstyp($host,$username,$password,$database);


$images = array(
    '<img src="images/pic humg refine.jpg" alt=""',
    '<img src="images/pic 9 refine.jpg" alt="">',
    '<img src="images/pic 10 refine.jpg" alt="">',
    '<img src="images/pic 11 refine.jpg" alt="">',
    '<img src="images/pic 12 refine.jpg" alt="">',
    '<img src="images/pic 14 refine.jpg" alt="">',
    '<img src="Images/pic 15.jpg" alt="">',
    '<img src="Images/pic 16.jpg" alt="">',
    '<img src="Images/pic 17.jpg" alt="">',
);

$price = array(1600,1500,500,600,300,800,300,700,500);

//loping through the post data

foreach($_POST as $postvalue){
    
    $_SESSION['id'] = $postvalue;
    
    switch($_POST['div']){

        case 'cart1':
            $_SESSION['id1'] = 1;
            break;
        
        case 'cart2':
            $_SESSION['id2'] = 2;
            break;

        case 'cart3':
            $_SESSION['id3'] = 3;
            break;

        case 'cart4':
            $_SESSION['id4'] = 4;
            break;

        case 'cart5':
            $_SESSION['id5'] = 5;
            break;

        case 'cart6':
            $_SESSION['id6'] = 6;
            break;

        case 'cart7':
            $_SESSION['id7'] = 7;
            break;

        case 'cart8':
            $_SESSION['id8'] = 8;
            break;

        case 'cart9':
            $_SESSION['id9'] = 9;
            break;
        default:
            return "Nothing in the Cart!";
            break;
        }
    

}


if(isset($_SESSION['id'])!=0){

if(isset($_SESSION['id1'])){ 
    $divs = '<div class="bg-dark divs" id="div-remove1" style="padding:1rem;width:280px; border-radius:1rem;">'.
    $images[0].'<h4>'.'Food Infor'.'</h4>'.
    $object->data(1)."<h5 style='color:red;'>".
    'Price Ksh '.$price[0]."</h5>".
    "<div class='butts'  id='remove1'>".
    '<button>'.'Remove'.'</button>'
    ."</div>".'</div>';
    $_SESSION['price1'] = $price[0];
    echo $divs;
    
}

if(isset($_SESSION['id2'])){
    $divs = '<div class="bg-dark divs" id="div-remove2" style="padding:1rem;width:280px; border-radius:1rem;">'.
    $images[1].'<h4>'."Food Infor".'</h4>'.
    $object->data(2)."<h5 style='color:red;'>".
    'Price Ksh '.$price[1]."</h5>".
    "<div class='butts' id='remove2'>".
    '<button>'.'Remove'.'</button>'
    ."</div>".'</div>';
    $_SESSION['price2'] = $price[1];
    echo $divs;
}

if(isset($_SESSION['id3'])){
    $divs = '<div class="bg-dark divs" id="div-remove3" style="padding:1rem;width:280px; border-radius:1rem;">'.
    $images[2].'<h4>'."Food Infor".'</h4>'.
    $object->data(3)."<h5 style='color:red;'>".
    'Price Ksh '.$price[2]."</h5>".
    "<div class='butts' id='remove3'>".
    '<button>'.'Remove'.'</button>'
    ."</div>".'</div>';
    $_SESSION['price3'] = $price[2];
    echo $divs;
}

if(isset($_SESSION['id4'])){
    $divs = '<div class="bg-dark divs" id="div-remove4" style="padding:1rem;width:280px; border-radius:1rem;">'.
    $images[3].'<h4>'."Food Infor".'</h4>'.
    $object->data(4)."<h5 style='color:red;'>".
    'Price Ksh '.$price[3]."</h5>".
    "<div class='butts' id='remove4'>".
    '<button>'.'Remove'.'</button>'
    ."</div>".'</div>';
    $_SESSION['price4'] = $price[3];
    echo $divs;
}

if(isset($_SESSION['id5'])){
    $divs = '<div class="bg-dark divs" id="div-remove5" style="padding:1rem;width:280px; border-radius:1rem;">'.
    $images[4].'<h4>'."Food Infor".'</h4>'.
    $object->data(5)."<h5 style='color:red;'>".
    'Price Ksh '.$price[4]."</h5>".
    "<div class='butts' id='remove5'>".
    '<button>'.'Remove'.'</button>'
    ."</div>".'</div>';
    $_SESSION['price5'] = $price[4];
    echo $divs;
}

if(isset($_SESSION['id6'])){
    $divs = '<div class="bg-dark divs" id="div-remove6" style="padding:1rem;width:280px; border-radius:1rem;">'.
    $images[5].'<h4>'."Food Infor".'</h4>'.
    $object->data(6)."<h5 style='color:red;'>".
    'Price Ksh '.$price[5]."</h5>".
    "<div class='butts' id='remove6'>".
    '<button>'.'Remove'.'</button>'
    ."</div>".'</div>';
    $_SESSION['price6'] = $price[5];
    echo $divs;
}

if(isset($_SESSION['id7'])){
    $divs = '<div class="bg-dark divs" id="div-remove7" style="padding:1rem;width:280px; border-radius:1rem;">'.
    $images[6].'<h4>'."Food Infor".'</h4>'.
    $object->data(7)."<h5 style='color:red;'>".
    'Price Ksh '.$price[6]."</h5>".
    "<div class='butts' id='remove7'>".
    '<button>'.'Remove'.'</button>'
    ."</div>".'</div>';
    $_SESSION['price7'] = $price[6];
    echo $divs;
}

if(isset($_SESSION['id8'])){
    $divs = '<div class="bg-dark divs" id="div-remove8" style="padding:1rem;width:280px; border-radius:1rem;">'.
    $images[7].'<h4>'."Food Infor".'</h4>'.
    $object->data(8)."<h5 style='color:red;'>".
    'Price Ksh '.$price[7]."</h5>".
    "<div class='butts' id='remove8'>".
    '<button>'.'Remove'.'</button>'
    ."</div>".'</div>';
    $_SESSION['price8'] = $price[7];
    echo $divs;
}

if(isset($_SESSION['id9'])){
    $divs = '<div class="bg-dark divs" id="div-remove9" style="padding:1rem;width:280px; border-radius:1rem;">'.
    $images[8].'<h4>'."Food Infor".'</h4>'.
    $object->data(9)."<h5 style='color:red;'>".
    'Price Ksh '.$price[8]."</h5>".
    "<div class='butts' id='remove9'>".
    '<button>'.'Remove'.'</button>'
    ."</div>".'</div>';

    $_SESSION['price9'] = $price[8];
    echo $divs;
}
}else{
    echo '<h3>'."Your Cart is Empty".'</h3>';
}


//unasigning the session ids
if(isset($_SESSION['remove'])){

}

?>
