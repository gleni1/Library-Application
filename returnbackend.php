<?php
    session_start();
    $rcid = $_SESSION['rcid'];
    $cpid = $_SESSION['cpid'];

    // echo $rcid;
    // echo '<br>';
    // echo $cpid;


    $conn = mysqli_connect("sql1.njit.edu", "mp973", "Laptop2001.", "mp973");
    //$result = mysqli_query($conn, "SELECT * FROM CostumerRecord;");
    $result = mysqli_query($conn, "SELECT * FROM CostumerPurchases");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $count =  mysqli_num_rows($result);
    $x = 0;

    function redirect($url) {
        header('Location: '.$url);
        die();
    }

    while($row = mysqli_fetch_assoc($result)){


        if($row['PCostumerID']== $rcid && $row['PurchaseID']==$cpid){
            
            $sql = "DELETE FROM `CostumerPurchases` WHERE PurchaseID = $cpid;";
            
            break;

       
        }else{
            $x += 1;
            continue;
        }
    }

    if($x == $count){

        echo '<script type="text/javascript">';
        echo ' alert("PURCHASE ID DOES NOT EXIST FOR THE COSTUMER. PLEASE CHECK AND RE-ENTER PURCHASE ID.")';  //not showing an alert box.
        echo '</script>';
        header('refresh:0.1; url= returnorder.php');

        //redirect('returnorder.php');
    }

    //echo "Costumer not found.";

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo ' alert("Costumer Purchase Returned.")';  //not showing an alert box.
        echo '</script>';
        header('refresh:0.1; url= returnorder.php');
      } else {
        echo "Error deleting record: " . $conn->error;
      }
?>