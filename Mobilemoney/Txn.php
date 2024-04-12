<?php

$db= new mysqli('localhost', 'root', '', 'mobilemoney');
// Recording transaction(s)
//customer side
if(isset($POST['transact'])){
    $currency= $_POST['currency'];
    $provider= $_POST['provider'];
    $service= $_POST['service'];
    $customer_no= $_POST['customer_no'];
    $amount= $_POST['amount'];
    $date= date('Y-m-d'); //date format
    
    $dbquery= "INSERT into transactions values('$customer_no', '$provider', '$service', '$currency', $amount);";
    $exec= mysqli_query($db, $dbquery);
    if($exec){
    include "dashboard.php";
    }
    else{
    echo $db->mysqli_error();     
}
}

//client side

if(isset($_POST['confirm'])){
    $clientName= $_POST['client_name'];
    $Currency= $_POST['currency'];
    $Service= $_POST['client_service'];
    $Amount= $_POST['client_amount'];
    $date= date('Y-m-d');
    // checking type of service
    
    
        if($Currency=='USD'){
        $db->query("INSERT into clientstxn(Txndate, clientName, Currency, Services, Amountusd) values ('$date', '$clientName', '$Currency', '$Service', $Amount);"); 
        
        if($Service == 'deposit'){
            $usdquery= $db->query("SELECT Amountusd from clients where clientName = '$clientName';");
            for($a=1; $a<= 1; $a++){
                $row= mysqli_fetch_row($usdquery);
                $balance= $row[0]; 
            }
            $posdeposit= $balance+$Amount;
            $dsuc$db->query("UPDATE clients set Amountusd= '$posdeposit' where clientName='$clientName';");
            
        }
        else{
            $negdeposit= $balance-$Amount;
            if($negdeposit<=0){
                echo "Sorry, you cannot withdraw more than $balance";
                }
            else{
            $db->query("UPDATE cients set Amountugx= '$negdeposit' where clientName='$clientName';");
            }
        }         
    }
        else{ 
        $db->query("INSERT into clientstxn(Txndate, clientName, Currency, Services, Amountugx) values ('$date', '$clientName', '$Currency', '$Service', $Amount);"); 
        
        if($Service == 'deposit'){
            $ugxquery= $db->query("SELECT Amountugx from clients where clientName = '$clientName';");
            for($a=1; $a<= 1; $a++){
                $row= mysqli_fetch_row($ugxquery);
                $ugbalance= $row[0]; 
            }
            $pdeposit= $ugbalance+$Amount;
            $db->query("UPDATE clients set Amountugx= '$pdeposit' where clientName='$clientName';");
        }
        else{
            $ndeposit= $ugbalance-$Amount;
            if($ndeposit<=0){
                echo "Sorry, you cannot withdraw more than $ugbalance";
            }
            else{
            $db->query("UPDATE cients set Amountugx= '$ndeposit' where clientName='$clientName';");
         }          
    }
    }
}    
   


?>