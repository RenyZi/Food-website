<?php
session_start();
if(isset($_SESSION['data_array'])){

    json_encode($_SESSION['data_array']);

    $arrids = $_SESSION['data_array'];

    foreach($arrids as $value){
      $value."<br>";      
    }

    $divelements = ['div-remove1','div-remove2','div-remove3','div-remove4','div-remove5','div-remove6','div-remove7',
                    'div-remove8','div-remove9'];

    $imgs = [

    '<img src="images/pic humg refine.jpg" alt=""',
    '<img src="images/pic 9 refine.jpg" alt="">',
    '<img src="images/pic 10 refine.jpg" alt="">',
    '<img src="images/pic 11 refine.jpg" alt="">',
    '<img src="images/pic 12 refine.jpg" alt="">',
    '<img src="images/pic 14 refine.jpg" alt="">',
    '<img src="Images/pic 15.jpg" alt="">',
    '<img src="Images/pic 16.jpg" alt="">',
    '<img src="Images/pic 17.jpg" alt="">',

    ];

    class retrivedata{
      private $conn;

      function __construct($host,$username,$password,$dbasename)
      {
        $this->conn = new mysqli($host,$username,$password,$dbasename);
      }

      function get_data($id){
        $stm = $this->conn->prepare(" SELECT * FROM Foodvarities WHERE ID = ?; ");
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
    //END of class

    $host = 'sql306.infinityfree.com';
    $username = 'if0_37341242';
    $password = 'yTqSkOFHdiURrXQ';
    $database = 'if0_37341242_Foodwebsite';

    
$obj = new retrivedata($host,$username,$password,$database);

if(in_array($divelements[0],$arrids) && isset($_SESSION['id1'])){
    $divs = '<div class="bg-dark divs" id="div-remove1" style="padding:1rem;width:280px; border-radius:1rem;">'.
    $imgs[0].'<h4>'."Food Infor".'</h4>'.
    $obj->get_data(1)."<h5 class='bg-success' style='margin-top:1rem; padding:0.4rem;'>".
    'Confirmed Order'."</h5>".'</div>';
    echo $divs;

}
if(in_array($divelements[1],$arrids) && isset($_SESSION['id2'])){
  $divs = '<div class="bg-dark divs" id="div-remove1" style="padding:1rem;width:280px; border-radius:1rem;">'.
  $imgs[1].'<h4>'."Food Infor".'</h4>'.
  $obj->get_data(2)."<h5 class='bg-success' style='margin-top:1rem; padding:0.4rem;'>".
  'Confirmed Order'."</h5>".'</div>';
  echo $divs;

}

if(in_array($divelements[2],$arrids) && isset($_SESSION['id3'])){
  $divs = '<div class="bg-dark divs" id="div-remove1" style="padding:1rem;width:280px; border-radius:1rem;">'.
  $imgs[2].'<h4>'."Food Infor".'</h4>'.isset($_SESSION['name']).
  $obj->get_data(3)."<h5 class='bg-success' style='margin-top:1rem; padding:0.4rem;'>".
  'Confirmed Order'."</h5>".'</div>';
  echo $divs;

}
if(in_array($divelements[3],$arrids) && isset($_SESSION['id4'])){
  $divs = '<div class="bg-dark divs" id="div-remove1" style="padding:1rem;width:280px; border-radius:1rem;">'.
  $imgs[3].'<h4>'."Food Infor".'</h4>'.
  $obj->get_data(4)."<h5 class='bg-success' style='margin-top:1rem; padding:0.4rem;'>".
  'Confirmed Order'."</h5>".'</div>';
  echo $divs;

}
if(in_array($divelements[4],$arrids) && isset($_SESSION['id5'])){
  $divs = '<div class="bg-dark divs" id="div-remove1" style="padding:1rem;width:280px; border-radius:1rem;">'.
  $imgs[4].'<h4>'."Food Infor".'</h4>'.
  $obj->get_data(5)."<h5 class='bg-success' style='margin-top:1rem; padding:0.4rem;'>".
  'Confirmed Order'."</h5>".'</div>';
  echo $divs;

}
if(in_array($divelements[5],$arrids) && isset($_SESSION['id6'])){
  $divs = '<div class="bg-dark divs" id="div-remove1" style="padding:1rem;width:280px; border-radius:1rem;">'.
  $imgs[5].'<h4>'."Food Infor".'</h4>'.
  $obj->get_data(6)."<h5 class='bg-success' style='margin-top:1rem; padding:0.4rem;'>".
  'Confirmed Order'."</h5>".'</div>';
  echo $divs;

}
if(in_array($divelements[6],$arrids) && isset($_SESSION['id7'])){
  $divs = '<div class="bg-dark divs" id="div-remove1" style="padding:1rem;width:280px; border-radius:1rem;">'.
  $imgs[6].'<h4>'."Food Infor".'</h4>'.
  $obj->get_data(7)."<h5 class='bg-success' style='margin-top:1rem; padding:0.4rem;'>".
  'Confirmed Order'."</h5>".'</div>';
  echo $divs;

}
if(in_array($divelements[7],$arrids) && isset($_SESSION['id8'])){
  $divs = '<div class="bg-dark divs" id="div-remove1" style="padding:1rem;width:280px; border-radius:1rem;">'.
  $imgs[7].'<h4>'."Food Infor".'</h4>'.
  $obj->get_data(8)."<h5 class='bg-success' style='margin-top:1rem; padding:0.4rem;'>".
  'Confirmed Order'."</h5>".'</div>';
  echo $divs;

}
if(in_array($divelements[8],$arrids) && isset($_SESSION['id9'])){
  $divs = '<div class="bg-dark divs" id="div-remove1" style="padding:1rem;width:280px; border-radius:1rem;">'.
  $imgs[8].'<h4>'."Food Infor".'</h4>'.
  $obj->get_data(9)."<h5 class='bg-success' style='margin-top:1rem; padding:0.4rem;'>".
  'Confirmed Order'."</h5>".'</div>';
  echo $divs;

}


}else{
    echo "Your dashboard is Empty";
}
?>