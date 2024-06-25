<?php
include "myAdmin.php"; 
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
    <title>Settings</title>

<style>
        * {box-sizing: border-box}
    .tab {
      float: left;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
      width: 30%;
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
      border: 1px solid #ccc;
      width: 70%;
      border-left: none;
      min-height: 300px;
    }
    th, td{
        min-width: 150px;
    }
</style>
</head>
<body>
  <div style="text-align: center;">
  <span style="font-family:algerian; color: blue; font-size: 50px;">DAHAB ELECTRONICS AND MOBILE MONEY</span>
</div>
    <div class="w3-bar w3-light-grey">
    <a href="dashboard.php" class="w3-bar-item w3-button w3-mobile w3-hover-blue" style="width: 26%;">Home</a>
    <a href="index.php" class="w3-bar-item w3-button w3-mobile w3-hover-blue w3-right">Log out</a> <!--Logout-->
    </div>
    <div class="w3-container w3-red" style="text-align: center; font-size: medium;">
        Settings
    </div>

    <div class="tab">
        <button class="tablinks" onclick="openDiv(event, 'View')">View Client</button>
        <button class="tablinks" onclick="openDiv(event, 'Add')">Add Client</button>
        <button class="tablinks" onclick="openDiv(event, 'Update')">Update User</button>
    </div>
    <div id="View" class="tabcontent w3-table w3-striped w3-bordered">
    <table >
            <thead>
                <td>Client Id</td>
                <td>Client Name</td>
                <td>Open Date</td> 
                <td>Balance(ugx)</td>
                <td>Balance(usd)</td> 
            </thead>
            <tbody>
              <?php

                $clientquery= $db->query("SELECT * from clients");
                $clientnum= mysqli_num_rows($clientquery);              
                    
                for($a=1; $a<= $clientnum; $a++){
                  $crow= mysqli_fetch_row($clientquery);
                  $Clientid= $crow[0];
                  $Clientname= $crow[1];
                  $Opendate= $crow[2];
                  $Amountugx= $crow[3];
                  $Amountusd= $crow[4];
                  echo "  
                <tr>
                    <td>$Clientid</td>
                    <td>$Clientname</td>
                    <td>$Opendate</td>
                    <td>$Amountugx</td>
                    <td>$Amountusd</td>
                </tr>
                ";
              } ?>
            </tbody>
        </table>
    </div>
    <div id="Add" class="tabcontent" style="display: none;">
                <form action="myAdmin.php" method="post" class="w3-container">
                    <div class="row">
                      <label>Client Id</label><br>
                      <input type="text" name="clientid" class="w3-input w3-border-red" placeholder="Telephone">
                        
                    <label>Client Name</label><br>
                    <input type="text" name="clientname" class="w3-input w3-border-red">
                
                    
                    <label>Currency</label>        
                    <select name="currency" class="w3-input w3-border-red">
                      <option value="#">Select</option>
                      <option value="UGX">UGX</option>
                      <option value="USD">USD</option>
                    </select>

                    <label>Amount</label><br>
                    <input type="number" name="depamount" class="w3-input w3-border-red"> 
                    <br>
                    <input type="submit" value="SAVE" name="save">
                    </div><br>
    </div>
    <div id="Update" class="tabcontent" style="display:none;">
            <form action="myAdmin.php" method="post" class="w3-container">
                <div class="row">
                    
                        <label>User Id</label><br>
                        <input type="text" name="userid" class="w3-input w3-border-red" style="width: 70%">
                    
                    
                        <label>Username</label><br>
                        <input type="text" name="username" class="w3-input w3-border-red" style="width: 70%">
                    
                    
                        <label>Password</label><br>
                        <input type="password" name="userpassword" class="w3-input w3-border-red" style="width: 70%">
                    
                </div><br>
                <div class="row">
                    <input type="submit" value="UPDATE" name="edit" style="width: 10%">
                </div>
            </form>
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