<?php
date_default_timezone_set('Africa/Nairobi');
$db= new mysqli('localhost', 'root', '', 'mobilemoney');
// Recording transaction(s)
//customer side
if(isset($_POST['transact'])){
$currency= $_POST['currency'];
    $provider= $_POST['provider'];
    $service= $_POST['service'];
    $customer_no= $_POST['customer_no'];
    $customer_name= $_POST['customer_name'];
    $amount= $_POST['amount'];
    $date= date('Y-m-d'); //date format
    
    
    $ndep= $db->query("INSERT into transactions values('$date','$customer_no','$customer_name', '$provider', '$service', '$currency', $amount);");
    if($ndep){
        echo "<script>alert('Success!');
        window.location.href= 'dashboard.php';
        </script>";
    }
    else{
        echo "Error:".$db->error;
    }
}


//client side

if(isset($_POST['confirm'])){
    $clientName= $_POST['client_name'];
    $Currency= $_POST['currency'];
    $Service= $_POST['client_service'];
    $Amount= $_POST['client_amount'];
    $date= date('Y-m-d');
    $timein= date('H:i:s');
    $timeout= date('H:i:s');
    $profit= $_POST['profit'];
    // checking type of service
    
    
    if($Currency=='Dollar'){
        if($Service=='Deposit'){
       $ins=$db->query("INSERT into clientstxn(Txndate, clientName, Currency, Services, Amountusd,Profit,Timein, Outtime) values('$date', '$clientName', '$Currency', '$Service', $Amount,$profit, '$timein','$timeout');"); 
        if($ins){
            echo "<script>alert('Success!');
            window.location.href= 'dashboard.php';
            </script>";
        }
        elseif($Service=='Withdraw'){
            $wins=$db->query("INSERT into clientstxn(Txndate, clientName, Currency, Services, Amountusd, Profit, Outtime) values ('$date', '$clientName', '$Currency', '$Service', $Amount, $profit,'$timeout');"); 
            if($wins){
                echo "<script>alert('Success!');
                window.location.href= 'dashboard.php';
                </script>";
            }  
        }
    }
        
    elseif($Currency=='Shilling'){ 
        
        if($Service == 'Deposit'){
            $ugins= $db->query("INSERT into clientstxn(Txndate, clientName, Currency, Services, Amountugx, Profit,Timein) values ('$date', '$clientName', '$Currency', '$Service', $Amount, $profit, '$timein')"); 
            if($ugins){
                echo "<script>alert('Success!');
                window.location.href= 'dashboard.php';
                </script>";
            }
        }
        elseif($Service=='Withdraw'){
            $uwins= $db->query("INSERT into clientstxn(Txndate, clientName, Currency, Services, Amountugx, Profit,Outtime) values ('$date', '$clientName', '$Currency', '$Service', $Amount, $profit,'$timeout')"); 
            if($uwins){
                echo "<script>alert('Success!');
                window.location.href= 'dashboard.php';
                </script>";
            }         
    }
    }
    }
    }
?>