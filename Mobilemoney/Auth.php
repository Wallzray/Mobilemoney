<!-- LOG IN CONTROL-->
<style>
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class when clicking on the popup container (hide and show the popup) */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>
<?php
$db= mysqli_connect('localhost', 'root', '', 'mobilemoney');
if(isset($_POST['submit'])){
    $username= $_POST['username'];
    $password= $_POST['password'];
   
    $p= "SELECT * from admins where Username= '$username';";
    $w= mysqli_query($db, $p);
    $n= mysqli_num_rows($w);
   for($a=1; $a <= $n; $a++){
    $rp= mysqli_fetch_row($w);
    $rpassword= $rp[1];
    $rusername= $rp[0];
   }
   if($username==$rusername && $password== $rpassword){
    if($username=="Admin" && $password== "Admin124"){
        include "admin.php";
    }
    else{
        include "dashboard.php";
    }
   }
   elseif($username !=$rusername || $password != $rpassword){
    echo  "<span class='popup popuptext'Wrong password <a href= 'index.php'> Try again</a>";
    }
    
}
?>