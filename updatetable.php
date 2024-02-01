<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    
    session_start();
   
    $cname = $_SESSION['cname'];
    $clname = $_SESSION['clname'];
    $cid = $_SESSION['cid'];
    $spurchase = $_SESSION['spurchase'];
    $opurchase = $_SESSION['opurchase'];
    $date = $_SESSION['date'];
    $payment = $_SESSION['payment'];
    $order = $_SESSION['order'];
    $address = $_SESSION['address'];


    $purchaseid = rand(100000, 999999);
    $orderid = rand(100000, 999999);
    $costumerid = rand(1000, 10000);
    $conn = mysqli_connect("sql1.njit.edu", "mp973", "Laptop2001.", "mp973");
    $result = mysqli_query($conn, "SELECT * FROM CostumerRecord;");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $count =  mysqli_num_rows($result);
    $x = 0;

    

    while($row = mysqli_fetch_assoc($result)){

        if($row['CFirstName']== $cname && $row['CLastName']== $clname && $row['CID']== $cid){

           
            if( strcmp($spurchase, "NA")==0 || empty($spurchase) ){
                $sql = "
                INSERT INTO CostumerOrders 
                VALUES ('$opurchase', '$address', 12345678, $cid, $orderid, '$date');
                ";
                break;
            }
            if(strcmp($opurchase, "NA")==0 || empty($opurchase)){
                $sql = "
                INSERT INTO CostumerPurchases (`Purchase`, `PurchTime`, `Payment`, `PurchaseID`, `PCostumerID`, `BookSellerID`)
                VALUES ('$spurchase', '$date', 'Cash', $purchaseid, $cid, 12345678);
                ";
               break;
            }
            
        }else{
        
            $x +=1;
            continue;
        }

        
    }


    if($x == $count){

        echo '<script type="text/javascript">';
        echo ' alert("COSTUMER CANNOT BE FOUND. RECHECK DATA ENTERED OTHERWISE YOU NEED TO CREATE AN ACCOUNT FOR CLIENT.")';  //not showing an alert box.
        echo '</script>';
    }

    


    if ($conn->query($sql)===TRUE) {
    echo '<script>alert("Purchase/Order Placed")</script>';
    Header('refresh:0.1; url= index.php');
    } else {

    echo '<script>alert("Please check your data. Make sure you fill out all required fields.")</script>';
    }

    
    
    $conn->close();

?>
