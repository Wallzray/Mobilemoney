<?php

$db= mysqli_connect('localhost', 'root', '', 'mobilemoney');
//USER LOGIC
if(isset($_POST['useradd'])){
    $id= $_POST['userid'];
    $username= $_POST['username'];
    $userpassword= $_POST['password'];

    $exec= $db->query("INSERT into users values('$id', '$username', '$userpassword');");


}

if(isset($_POST['edit'])){
    $userid= $_POST['userid'];
    $username= $_POST['username'];
    $userpass= $_POST['userpassword'];
// check to see available information
    $selquery= $db->query("SELECT * from users where Userid='$userid';");
    for($a=1; $a<= 1; $a++){
        $row= mysqli_fetch_row($selquery);
        $avId= $row[0];
        $avUsername= $row[1];
        $avPassword= $row[2];
    }
// update the unmatching records
    if($username != $avUsername){
        $db->query("UPDATE users set Username= '$username' where Userid='$userid';");
    }
    elseif($userpass != $avPassword){
        $db->query("UPDATE users set  Userpassword= '$userpass' where Userid='$userid';");
    }
}       


//CLIENT LOGIC
//add
if(isset($_POST['save'])){
    $clientid= $_POST['clientid'];
    $clientname= $_POST['clientname'];
    $currency= $_POST['currency'];
    $initdeposit= $_POST['depamount'];
    $opendate= date('Y-m-d');
    if($currency=='UGX'){
        $db->query("INSERT into clients(clientId,clientName,openDate,Amountugx) values('$clientid','$clientname','$opendate',$initdeposit);");
    }
    else{
        $db->query("INSERT into clients(clientId,clientName,openDate,Amountusd) values('$clientid','$clientname','$opendate',$initdeposit);");
    }
}


?>