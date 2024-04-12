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
    justify-content: space-between;
    
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
        <span style="font-family:algerian; color: rgb(26, 26, 247); font-size: 50px;"> THE MOBILE MONEY ACCOUNTANT</span>
    </div>
    <div class="w3-bar w3-light-grey">
        <a href="admin.php" class="w3-bar-item w3-button w3-mobile w3-hover-blue"  style="width: 26%; margin-left: 60%;">Admin</a>
        <a href="index.php" class="w3-bar-item w3-button w3-mobile w3-hover-blue w3-right">Log out</a> <!--Logout-->
    </div>
    <div class="w3-container w3-blue" style="text-align: center; font-size: medium; margin-bottom: 5px;">
        Transactions
    </div>
    <div class="c_transactions">
        <div class="left col-md-6">
            <button onclick="myFunction('form_div')">CUSTOMER TRANSACTIONS</button>
            <div id="form_div" class="w3-hide">
                <form method="post" action="Txn.php">
                <label>Choose the currency</label>
                
                <select name="currency" class="w3-input" type='text'>
                    <option value="Shilling">UGX</option>
                    <option value="Dollar">USD</option>
                </select>
                
                <label>Choose the Service provider</label>
                <select name="provider" class="w3-input" type='text'>
                    <option value="Airtel"><img src="images/airtel.jfif" alt="airtel" height="20px" width="20px">Airtel</option>
                    <option value="MTN"><img src="images/mtn logo.jfif" alt="mtn" height="15px" width="15px"> MTN</option>
                    <option value="Mpesa"><img src="images/mpesa.jfif" alt="mpesa" height="15px" width="15px"> M-Pesa</option>
                </select>
                <label>Choose the service</label>
                <select name="service" class="w3-input" type='text'>
                    <option value="#">Service</option>
                    <option value="Deposit">Deposit</option>
                    <option value="Withdraw">Withdraw</option>
                    <option value="Airtime">Airtime</option>
                </select>
                <label>Enter the Customer number</label>
                    <input type="tel" name="customer_no" class="w3-input">
                <label>Enter the Amount</label>
                    <input type="number" name="amount" class="w3-input"><br>
                
                <input type="submit" value="TRANSACT" name="transact">
            
            </form>        
        </div>
    </div>
    
    <!-- Client form -->
    <div class="right col-md-6">
    <button  onclick="myFunction('client_form')">OTHER TRANSACTIONS</button><!--client & normal transactions-->
        <div id="client_form" class="w3-hide">
        <form method="post" action="Txn.php">
            <label>Enter Client's name</label>
            <input type="text" name="client_name" placeholder="Name" class="w3-input">
            <label>Choose the Currency</label>
            <select name="currency" class="w3-input">
                <option value="Shilling">UGX</option>
                <option value="Dollar">USD</option>
            </select>
            <label>Choose the service</label>
            <select name="client_service" class="w3-input">
                <option value="Deposit">Deposit</option>
                <option value="Withdraw">Withdraw</option>
            </select>
            <label>Enter the amount</label>
                <input type="number" name="client_amount" class="w3-input"><br>
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
        x.className = x.className.replace(" w3-show", "");
      }
    }
    </script>
</body>
</html>