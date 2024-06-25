<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <title>HOME</title>
</head>
<body>
    
<div style="text-align: center;">
        <span style="font-family:algerian; color: blue; font-size: 50px;"> DAHAB ELECTRONICS AND MOBILE MONEY</span>
    </div>
<div class="w3-container w3-blue" style="text-align: center; font-size: medium;">
        Welcome, Please Log In
    </div>
<div>
    <div class="w3-container" style="margin-left: 20%;">
    <form action="Auth.php" method="post" class="form-control">
            <div >
                <label>Enter Username</label><br>
                <input type="text" name="username" class="w3-input w3-border-blue" style="width: 50%">
            </div>
            <div>
                <label>Enter Password</label><br>
                <input type="text" name="password" class="w3-input w3-border-blue" style="width: 50%">
            </div>
            <div>
                <label>Login As</label><br>
                <select name="user" class="w3-input w3-border-blue" style="width: 50%">
                    <option value="" class="w3-input w3-border-blue" style="width: 50%">Select</option>
                    <option value="" class="w3-input w3-border-blue" style="width: 50%">Admin</option>
                    <option value="" class="w3-input w3-border-blue" style="width: 50%">User</option>
                </select>
            </div>
        <br>
        <div class="row">
            <input type="submit" value="ENTER" name= "submit" class= "w3-btn w3-blue">
        </div>
        
    </form>
</div>
</div>

</body>