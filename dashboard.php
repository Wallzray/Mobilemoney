<?php 
$db= new mysqli('localhost', 'root', '', 'mobilemoney');
$clients= $db->query("SELECT * FROM clients"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <style>
.c_transactions{
    display: flex;
    justify-content: space-between;
    min-height: 20px;
    
}
.left{
    /* justify-content: space-between; */
  
    
}
.right{
    justify-content: space-between;
    margin-right: 250px;
}
        
    </style>
    <title>Home</title>
</head>
<body>
    <div style="text-align: center;">
        <span style="font-family:algerian; color: blue; font-size: 50px;">DAHAB ELECTRONICS AND MOBILE MONEY</span>
    </div>
    <div class="w3-bar w3-light-grey">
        <a href="setting.php" class="w3-bar-item w3-button w3-mobile w3-hover-blue" style="width: 26%;">Settings</a>
        
        <!-- <?php
        echo "Hello, $dpname";
        ?> -->
        </a>
        <a href="index.php" class="w3-bar-item w3-button w3-mobile w3-hover-blue w3-right">Log out</a>
    </div>
    <div class="w3-container w3-blue" style="text-align: center; font-size: medium; margin-bottom: 5px;">
        Transactions
    </div>
    <div class="c_transactions">
        <div class="left col-md-6" style="min-height: 50%;">
            <button>CUSTOMER TRANSACTIONS</button>
            <div id="form_div">
                <form method="post" action="Txn.php">
                <label>Choose the currency</label>
                
                <select name="currency" class="w3-input w3-border-blue" type='text'>
                    <option value="#">Select</option>
                    <option value="UGX">UGX</option>
                    <option value="USD">USD</option>
                </select>
                
                <label>Choose the Service provider</label>
                <select name="provider" class="w3-input w3-border-blue" type='text'>
                    <option value="#">Select</option>
                    <option value="Sahal">Sahal</option>
                    <option value="Zaad">Zaad</option>
                    <option value="EVC">EVC Plus</option>
                    <option value="Salam Bank">Salam Bank</option>
                    <option value="Marchant">Marchant</option>
                    <option value="Airtel">Airtel</option>
                    <option value="MTN"> MTN</option>
                    <option value="Payway"> Payway</option>
                    <option value="Mpesa">M-Pesa</option>
                </select>
                <label>Choose the service</label>
                <select name="service" class="w3-input w3-border-blue" type='text'>
                    <option value="#">Select</option>
                    <option value="Deposit">Deposit</option>
                    <option value="Withdraw">Withdraw</option>
                </select>
                <label>Enter the Customer number</label>
                    <input type="tel" name="customer_no" class="w3-input w3-border-blue">
                <label>Enter the Customer name</label>
                    <input type="tel" name="customer_name" class="w3-input w3-border-blue">
                <label>Enter the Amount</label>
                    <input type="number" name="amount" class="w3-input w3-border-blue"><br>
                
                <input type="submit" value="SAVE" name="transact" class="w3-btn w3-blue">
            
            </form>        
        </div>
    </div>
    
    <!-- Client form -->
    <div class="right col-md-6"  style="min-height: 50%; min-width: 20%;">
    <button onclick="myFunction(client_form)">CLIENT TRANSACTIONS</button>
        <div id="client_form">
        <form method="post" action="Txn.php">
            <label>Enter Client's name</label><br>
            <select name="client_name" class="w3-input w3-border-blue">
                <option value="#">--Select--</option>
                <?php while($row=mysqli_fetch_row($clients)){?>
                    <option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
                    <?php };?>
            </select><br>
            <label>Choose the Currency</label>
            <select name="currency" class="w3-input w3-border-blue">
                <option value="Shilling">UGX</option>
                <option value="Dollar">USD</option>
            </select>
            <label>Choose the service</label>
            <select name="client_service" class="w3-input w3-border-blue">
                <option value="Deposit">Deposit</option>
                <option value="Withdraw">Withdraw</option>
            </select>
            <label>Enter the amount</label>
                <input type="number" name="client_amount" class="w3-input w3-border-blue"><br>
            <label>Profits</label>
                <input type="number" name="profit" class="w3-input w3-border-blue"><br>
            <input type="submit" value="CONFIRM" name="confirm" class="w3-btn w3-blue">
        </form>
    </div>
    </div>
</div>
<script>
    function myFunction(id) {
      var x = document.getElementById(id);
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else {
        x.className = x.className.replace("w3-show", "").trim();
      }
    }
    </script>
</body>
</html>