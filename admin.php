
<?php 
include "txnview.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <style>
            * {box-sizing: border-box}
    .tab {
      float: left;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
      width: 15%;
      min-height: 400px;
    }
    
    .tab button {
      display: block;
      background-color: inherit;
      color: black;
      padding: 22px 16px;
      width: 100%;
      border: none;
      outline: none;
      text-align: left;
      cursor: pointer;
      transition: 0.3s;
    }
    
    .tab button:hover {
      background-color: #ddd;
    }
    
    .tab button.active {
      background-color: #ccc;
    }
    
    .tabcontent {
      float: left;
      padding: 0px 12px;
      /* border: 1px solid #ccc; */
      width: 70%;
      border-left: none;
      min-height: 300px;
    }
         th, td{
        min-width: 120px;
    }
    
  </style>
    <title>Administration</title>
</head>
<body>
    <div style="text-align: center;">
    <span style="font-family:algerian; color: blue; font-size: 50px;">DAHAB ELECTRONICS AND MOBILE MONEY</span>
    </div>
    <div class="w3-bar w3-light-grey">
        <a href="admin.php" class="w3-bar-item w3-button w3-mobile w3-hover-blue"  style="width: 26%;">Home</a>
        <a href="client.php" class="w3-bar-item w3-button w3-mobile w3-hover-blue" style="width: 26%;">Client</a>
        <a href="user.php"class="w3-bar-item w3-button w3-mobile w3-hover-blue"    style="width: 26%;">Users</a>
        <a href="index.php" class="w3-bar-item w3-button w3-mobile w3-hover-blue w3-right">Log out</a>
    </div>
    <div class="w3-container w3-blue" style="text-align: center; font-size: medium;">
        Transactions
        </div>
        <div class="tab">
            <button class="tablinks" onclick="openDiv(event, 'normal')">Normal Transactions</button>
            <button class="tablinks" onclick="openDiv(event, 'client')">Client Transactions</button>
        </div>
        <div id="normal" class="tabcontent w3-table w3-striped w3-bordered" style="display:none;">
        <table>
            <thead>
                <td>Date</td>
                <td>Telephone</td>
                <td>Name</td>
                <td>Service Provider</td>
                <td>Details</td>
                <td>Currency</td>
                <td>Amount</td>
                <td>Action</td>
              </thead>
            <tbody>

              <?php
                
                $customerq= $db->query('SELECT * from transactions');
                $cnum= mysqli_num_rows($customerq);

                for($a=1; $a<= $cnum; $a++){
                  $row= mysqli_fetch_row($customerq);
                  $Txndate = $row[0];
                  $Customerno = $row[1];
                  $Customername = $row[2];
                  $Provider= $row[3];
                  $Serviceview= $row[4];
                  $Currencyview= $row[5];
                  $Amountview= $row[6]; ?>
                  
                   
                  <tr>
                <td><?php echo $Txndate; ?></td>
                <td><?php echo $Customerno; ?></td>
                <td><?php echo $Customername; ?></td>
                <td><?php echo $Provider; ?></td>
                <td><?php echo $Serviceview; ?></td>
                <td><?php echo $Currencyview; ?></td>
                <td><?php echo $Amountview; ?></td>"
                <td><a style='margin: 5px;' href="updates.php?delete_cust=<?php echo $Customerno; ?>">                 
                    <img src="images/icons/trash3.svg">
                    </a></td>"
               
             <?php }
              ?>  
            </tbody>
        </table>
    </div>

        <div id="client" class="tabcontent w3-table w3-striped w3-border-blue" style="display: none;">
        <table>
            <thead>
                <td>Date</td>
                <td>Client Name</td>
                <td>Currency</td>
                <td>Details</td>
                <td>Amount(ugx)</td>
                <td>Amount(usd)</td>
                <td>Time In</td>
                <td>Time Out</td>
                <td>Profits</td>
            </thead>
            <tbody>
              <?php

              $clientq= $db->query('SELECT * from clientstxn');
              $clnum= mysqli_num_rows($clientq);
              while($row= mysqli_fetch_row($clientq)){
                $Txndate = $row[0];
                $Clientname = $row[1];
                $Currencycl= $row[2];
                $Servicecl= $row[3];
                $Amountugx= $row[4];
                $Amountusd= $row[5]; 
                $Timein= $row[6]; 
                $Timeout= $row[7]; 
                $Profit= $row[8]; ?>
                <tr>
              <td><?php echo $Txndate; ?></td>
              <td><?php echo $Clientname;?></td>
              <td><?php echo $Currencycl;?></td>
              <td><?php echo $Servicecl;?></td>
              <td><?php echo $Amountugx;?></td>
              <td><?php echo $Amountusd;?></td>
              <td><?php echo $Timein;?></td>
              <td><?php echo $Timeout;?></td>
              <td><?php echo $Profit;?></td>
              </tr>
              <?php } ?>
            
            </tbody>
        </table>
    </div>

    <script>
        function openDiv(evt, divName) {
       
       var i, tabcontent, tablinks;
     
       tabcontent = document.getElementsByClassName("tabcontent");
       for (i = 0; i < tabcontent.length; i++) {
         tabcontent[i].style.display = "none";
       }
     
       tablinks = document.getElementsByClassName("tablinks");
       for (i = 0; i < tablinks.length; i++) {
         tablinks[i].className = tablinks[i].className.replace(" active", "");
       }
     
       document.getElementById(divName).style.display = "block";
       evt.currentTarget.className += " active";
     }
     
     </script> 

</body>

</html>