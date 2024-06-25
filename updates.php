
<style>
    form{
        width: 70%;
        border: 2px solid blue;
        text-align: center;
        margin-left: 15%;
    }
    input{
        padding: 10px 0px;
        width: 30%;
        margin-bottom: 10px;
    }
</style>
<script>
    function calAmount() {
    var purchase_paid = parseFloat(document.getElementById("purchase_paid").value);
    var purchase_amount=parseFloat(document.getElementById("purchase_amount").value) ;
    
    var purchase_due= purchase_amount- purchase_paid;
    document.getElementById("purchase_due").value= purchase_due;
};
</script>
<?php
$db = mysqli_connect("localhost", "root", "", "mobilemoney");

if (isset($_GET['med_update'])) {
    $update = $_GET['med_update'];
    $query1 = $connection->query("SELECT * FROM medicine_info WHERE medicine_name='$update'");
    if(!$query1){
        echo "Err:".$connection->error;
    }else{
    while ($row1 = mysqli_fetch_array($query1)) {
        echo "<form class='form' method='post'>";
        echo "<h2>Medicine Update Form</h2>";
        echo "<hr/>";
        echo "<label>Medicine name:</label><br />";
        echo "<input type='text' name='medname' value='{$row1['medicine_name']}'/><br/>";
        echo "<label>Generic name:</label><br />";
        echo "<input type='text' name='genericname' value='{$row1['generic_name']}'/><br/>";
        echo "<label>Available Quantity:</label><br />";
        echo "<input type='number' name='quantity' value='{$row1['qty_available']}'/><br/>";
        echo "<label>Unit Sales Price:</label><br />";
        echo "<input type='number' name='unitsales' value='{$row1['unit_selling_price']}'/><br/>";
        echo "<label>Supplier:</label><br />";
        echo "<input type='text' name='suppliername' value='{$row1['supplier_name']}'/><br/>";
        echo "<input type='submit' name='submit' value='Update'/>";
        echo "</form>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $medname = $_POST['medname'];
    $genericname= $_POST['genericname'];
    $quantity= $_POST['quantity'];
    $unitsales= $_POST['unitsales'];
    $suppliername= $_POST['suppliername'];
    
    $stmt = $connection->query("UPDATE medicine_info SET generic_name='$genericname',qty_available=$quantity, unit_selling_price=$unitsales,supplier_name='$suppliername' WHERE medicine_name='$medname';");
    
    if ($stmt) {
        header("Location: medicine.php");
    }

}
}

//staff update
if (isset($_GET['staff_update'])) {
    $update = $_GET['staff_update'];
    $query1 = $connection->query("SELECT * FROM staff WHERE id='$update'");
    if(!$query1){
        echo "Err:".$connection->error;
    }else{
    while ($row1 = mysqli_fetch_array($query1)) {
        echo "<form class='form' method='post'>";
        echo "<h2>User Update Form</h2>";
        echo "<hr/>";
        echo "<label>Username:</label><br />";
        echo "<input type='text' name='username' value='{$row1[1]}'/><br/>";
        echo "<label>Password:</label><br />";
        echo "<input type='text' name='password' value='{$row1[2]}'/><br/>";
        echo "<input type='submit' name='submit' value='Update'/>";
        echo "</form>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $password= md5($_POST['password']);
    
    $stmt = $connection->query("UPDATE staff SET userpassword='$password', username='$username' WHERE id='$update';");
    
    if ($stmt) {
        header("Location: staff.php");
    }


}
}

//supplier update
if (isset($_GET['supply_update'])) {
    $update = $_GET['supply_update'];
    $query1 = $connection->query("SELECT * FROM supplier WHERE supplier_id='$update'");
    if(!$query1){
        echo "Err:".$connection->error;
    }else{
    while ($row1 = mysqli_fetch_array($query1)) {
        echo "<form class='form' method='post'>";
        echo "<h2>Supplier Update Form</h2>";
        echo "<hr/>";
        echo "<label>Supplier Name:</label><br />";
        echo "<input type='text' name='suppliername' value='{$row1[1]}' /><br/>";
        echo "<label>Contact:</label><br />";
        echo "<input type='tel' name='mobile' value='{$row1[2]}'/><br/>";
        echo "<label>Unpaid Amount:</label><br />";
        echo "<input type='number' name='amount_unpaid' value='{$row1[4]}'/><br/>";
        echo "<input type='submit' name='submit' value='Update'/>";
        echo "</form>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $suppliername = $_POST['suppliername'];
    $contact= ($_POST['mobile']);
    $amount_unpaid= ($_POST['amount_unpaid']);
    
    $stmt = $connection->query("UPDATE supplier SET mobile='$contact', amount_due=$amount_unpaid WHERE supplier_id='$update';");
    
    if ($stmt) {
        header("Location: supplier.php");
    }
}
}

//purchase update
if (isset($_GET['purchase_update'])) {
    $update = $_GET['purchase_update'];
    $query1 = $connection->query("SELECT * FROM purchase_info WHERE purchase_id='$update'");
    if(!$query1){
        echo "Err:".$connection->error;
    }else{
    while ($row1 = mysqli_fetch_array($query1)) {
        echo "<form class='form' method='post'>";
        echo "<h2>Purchase Update Form</h2>";
        echo "<hr/>";
        echo "<label>Purchase Date:</label><br />";
        echo "<input type='date' name='purchasedate' value='{$row1[3]}'/><br/>";
        echo "<label>Medicine Name:</label><br />";
        echo "<input type='text' name='medicinename' value='{$row1[4]}'/><br/>";
        echo "<label>Unit Price:</label><br />";
        echo "<input type='number' name='unitprice' value='{$row1[7]}' /><br/>";
        echo "<label>Quantity:</label><br />";
        echo "<input type='number' name='quantity' value='{$row1[8]}' /><br/>";
        echo "<label>Purchase Amount:</label><br />";
        echo "<input type='number' name='purchase_amount' value='{$row1[9]} id='purchase_amount'/><br/>";
        echo "<label>Amount Paid:</label><br />";
        echo "<input type='number' name='paid_purchase' value='{$row1[10]}' id='purchase_paid' onkeyup='calAmount();'/><br/>";
        echo "<label>Amount Due:</label><br />";
        echo "<input type='number' name='unpaid_purchase' value='{$row1[11]}' id='purchase_due'/><br/>";
        echo "<label>Supplier:</label><br />";
        echo "<input type='text' name='supplier' value='{$row1[12]}' id='purchase_due'/><br/>";
        echo "<input type='submit' name='submit' value='Update'/>";
        echo "</form>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amountpaid= $_POST['purchase_amount'];
    $newdebt= $_POST['unpaid_purchase'];
    $supplier= $_POST['supplier'];
    $stmt = $connection->query("UPDATE purchase_info SET amount_paid=$amountpaid, amount_due=$newdebt WHERE purchase_id='$update';");
    
    $supplierquery = $connection->query("UPDATE supplier SET amount_due=$newdebt WHERE supplier_name='$supplier';");
    
    if ($stmt) {
        header("Location: inventory.php");
    }

}
}

//debtors update
if (isset($_GET['debt_update'])) {
    $update = $_GET['debt_update'];
    $query = $connection->query("SELECT * FROM sales_info WHERE sales_id=$update");
    if(!$query){
        echo "Err:".$connection->error;
    }
    else{
    while ($row = mysqli_fetch_array($query)) {
        echo "<form class='form' method='post'>";
        echo "<h2>Debtors Form</h2>";
        echo "<hr/>";
        echo "<label>Date:</label><br />";
        echo "<input type='date' name='date' value='{$row['sales_date']}'/><br/>";
        echo "<label>Customer name:</label><br />";
        echo "<input type='text' name='customername' value='{$row['customer_name']}' /><br/>";
        echo "<label>Medicine Name:</label><br />";
        echo "<input type='text' name='medname' value='{$row['medicine_name']}'/><br/>";
        echo "<label>Quantity:</label><br />";
        echo "<input type='number' name='quantity' value='{$row['qty']}'/><br/>";
        echo "<label>Total Sales Amount:</label><br />";
        echo "<input type='number' name='totalsales' value='{$row['sales_amount']}'/><br/>";
        echo "<label>Sales Paid:</label><br />";
        echo "<input type='number' name='salespaid' value='{$row['sales_paid']}'/><br/>";
        echo "<input type='submit' name='submit' value='Update'/>";
        echo "</form>";
    }
}

// posting data from update form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $newdate = $_POST['date'];
    $quantity= $_POST['quantity'];
    $totalsales= $_POST['totalsales'];
    $salespaid= $_POST['salespaid'];
    $salesdue= $totalsales- $salespaid;
    
    $stmt = $connection->query("UPDATE sales_info SET sales_date= '$newdate'sales_paid= $salespaid, sales_due=$salesdue WHERE sales_id=$update;");
    
    if ($stmt){
        header("Location: debtor.php");
}
}
}

//Delete medicine
if (isset($_GET['delete_cust'])) {
    $update = $_GET['delete_cust'];
    $query = $db->query("DELETE FROM transactions WHERE customerNo = '$update'");
    if(!$query){
        echo "Err:".$db->error;
    }
    else{
        header("Location: admin.php");
    }  
}

//Delete supplier
if (isset($_GET['delete_supp'])) {
    $update = $_GET['delete_supp'];
    $query = $connection->query("DELETE FROM supplier WHERE supplier_id=$update");
    if(!$query){
        echo "Err:".$connection->error;
    }
    else{
        header("Location: supplier.php");
    }  
}

//Delete staff
if (isset($_GET['delete_staff'])) {
    $update = $_GET['delete_staff'];
    $query = $connection->query("DELETE FROM staff WHERE id=$update");
    if(!$query){
        echo "Err:".$connection->error;
    }
    else{
        header("Location: staff.php");
    }  
}
?>