

<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    // session_start();
    $name = $_SESSION['name'];
    $lname = $_SESSION['lname'];
    $id = $_SESSION['id'];
    $password = $_SESSION['password'];
    $link = mysqli_connect("sql1.njit.edu", "mp973", "Laptop2001.", "mp973");
    $table = 'BookSeller';



    if(empty($name) || empty($lname) || empty($id) || empty($password)){
        echo '<script type="text/javascript">';
        echo ' alert("Please fill all required fields.")';  //not showing an alert box.
        echo '</script>';

        // header('refresh:0.00000000000000000000000000001; url= index.php');
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    $result2 = mysqli_query($link, "SELECT * FROM BookSeller AS BS 
    WHERE BS.BFirstName = '$name' AND BS.BLastName = '$lname' AND BS.BIdNumber = $id AND BS.Password = '$password';");
    ////WHERE BS.BFirstName = 'Serenity' AND BS.BLastName = 'Sanchez' AND BS.BIdNumber = 16421642 AND BS.Password = 'Stars2022.';");

    

    $result = mysqli_query($link, "SELECT * 
    FROM BookSeller AS BS 
    INNER JOIN CostumerPurchases 
    ON BS.BIdNumber = CostumerPurchases.BookSellerID 
    INNER JOIN CostumerRecord 
    ON CostumerRecord.CID = CostumerPurchases.PCostumerID 
    WHERE BS.BFirstName = '$name' AND BS.BLastName = '$lname' AND BS.BIdNumber = $id AND BS.Password = '$password';");
    //WHERE BS.BFirstName = 'Serenity' AND BS.BLastName = 'Sanchez' AND BS.BIdNumber = 16421642 AND BS.Password = 'Stars2022.';");



    $result1 = mysqli_query($link, 
        "SELECT * 
        FROM BookSeller AS BS 
        INNER JOIN CostumerOrders 
        ON BS.BIdNumber = CostumerOrders.BookSellerID 
        INNER JOIN CostumerRecord 
        ON CostumerRecord.CID = CostumerOrders.OCostumerID 
        WHERE BS.BFirstName = '$name' AND BS.BLastName = '$lname' AND BS.BIdNumber = $id AND BS.Password = '$password';
    "
    );

    $count =  mysqli_num_rows($result2);

    
    

    if($count==0){
        echo '<script type="text/javascript">';
        echo ' alert("BookSeller not found. Please check your data.")';  //not showing an alert box.
        echo '</script>';
        header('refresh:0.00000000000000000000000000001; url= index.php');
    }
 



  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment3</title>
    <link rel="stylesheet" href="styles11.css">
    
    <style>
        ul.nav {
            margin:0;
            padding:0;
            list-style:none;
            height:36px; line-height:36px;
            background:#0d7963; /* you can change the backgorund color here. */
            font-family:Arial, Helvetica, sans-serif;
            font-size:13px;
        }
        ul.nav li {
            border-right:1px solid #189b80; /* you can change the border color matching to your background color */
            float:left;
        }
        ul.nav a {
            display:block;
            padding:0 28px;
            color:#ccece6;
            text-decoration:none;
        }
        ul.nav a:hover,
        ul.nav li.current a {
            background:#086754;
        }
    </style>
</head>
<body>

<ul class="nav">
  <li><a href="index.php">Home</a></li>
  <li><a href="index.php">Search Bookseller's Records</a></li>
  <li><a href="purchaseform.php">Costumer Purchase/Order</a></li>
  <li><a href="returnorder.php">Costumer's Book/Order Return</a></li>
  <li><a href="updateorder.php">Update A Costumer's Book Order</a></li>
  <li><a href="cancelorder.php">Cancel A Costumer's Book Order</a></li>
  <li><a href="createaccount.php">Create A Costumer's Account</a></li>
</ul>

       
    <table algin="center" border="4px" style="width: 1400px; line-height:30px" color="white" id="table">
        <tr>
            <th colspan="15"><h2>Book Sellers</h2></th>
        </tr>
        <t>
            <th>First Name</th>
            <th>Last Name</th>
            <th>ID</th>
            <th>Phone Number</th>
            <th>Email</th>

            <th>Costumer First Name</th>
            <th>Costumer Last Name</th>
            <th>Costumer ID</th>

            <th>In Store Purchase</th>
            <th>Online Purchase</th>
            <th>Purchase Date & Time</th>
            <th>Payment Type</th>
            <th>Order Type</th>
            <th>Shipping Address</th>
            <th>Purchase ID</th>

            
        </t>
        <?php
            while($rows = mysqli_fetch_assoc($result))
            {
        ?> 
                <tr>
                    <td><?php echo $rows['BFirstName']; ?></td>
                    <td><?php echo $rows['BLastName']; ?></td>
                    <td><?php echo $rows['BIdNumber']; ?></td>
                    <td><?php echo $rows['PhoneNumber']; ?></td>
                    <td><?php echo $rows['Email']; ?></td>

                    <td><?php echo $rows['CFirstName']; ?></td>
                    <td><?php echo $rows['CLastName']; ?></td>
                    <td><?php echo $rows['PCostumerID']; ?></td>

                    <td><?php echo $rows['Purchase']; ?></td>
                    <td><?php echo 'N/A'; ?></td>
                    <td><?php echo $rows['PurchTime']; ?></td>
                    <td><?php echo $rows['Payment']; ?></td>
                    <td><?php 
                        if(isset($rows['Type'])){
                            echo $rows['Type']; 
                        } 
                        else{
                            echo'N/A'; 
                        } 
                        
                    ?></td>
                    <td>
                        <?php 
                        if(isset($rows['Address'])){
                            echo $rows['Address']; 
                        }else{
                            echo 'N/A';
                        }
                        
                        ?>
                    </td>
                    <td><?php echo $rows['PurchaseID']; ?></td>
                </tr>       
        <?php
            }
        ?>
        <?php
            while($rows = mysqli_fetch_assoc($result1))
            {
        ?> 
                <tr>
                    <td><?php echo $rows['BFirstName']; ?></td>
                    <td><?php echo $rows['BLastName']; ?></td>
                    <td><?php echo $rows['BIdNumber']; ?></td>
                    <td><?php echo $rows['PhoneNumber']; ?></td>
                    <td><?php echo $rows['Email']; ?></td>

                    <td><?php echo $rows['CFirstName']; ?></td>
                    <td><?php echo $rows['CLastName']; ?></td>
                    <td><?php echo $rows['OCostumerID']; ?></td>

                    <td><?php echo 'N/A'; ?></td>
                    <td><?php echo $rows['BookOrdered']; ?></td>
                    <td><?php echo $rows['OrderDate']; ?></td>
                    <td><?php echo 'Card'; ?></td>
                    <td><?php echo 'Online' ?></td>
                    <td><?php echo $rows['Address']; ?></td>
                    <td><?php echo $rows['OrderID']; ?></td>
                </tr>       
        <?php
            }
        ?>
    </table>
    
   
    
</body>
</html>
