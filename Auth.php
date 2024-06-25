<!-- LOG IN CONTROL-->
<?php
//start session
session_start();

$db= mysqli_connect('localhost', 'root', '', 'mobilemoney');
if(isset($_POST['submit'])){
    $username= $_POST['username'];
    $password= $_POST['password'];

    $_SESSION['username']= $username;
    $dpname= $_SESSION['username'];
    $p= "SELECT * from users where Username= '$username';";
    $w= mysqli_query($db, $p);
    $n= mysqli_num_rows($w);
   for($a=1; $a <= $n; $a++){
    $rp= mysqli_fetch_row($w);
    $rpassword= $rp[2];
    $rusername= $rp[1];
   }
   if($username==$rusername && $password== $rpassword){
    if($username=="Admin" && $password== "Admin124"){
        include "admin.php";
    }
    else{
        include "dashboard.php";
    }
   }
   else{
    echo  "<span class='popup popuptext'Wrong password <a href= 'index.php'> Try again</a>";
    }
    
}
?>