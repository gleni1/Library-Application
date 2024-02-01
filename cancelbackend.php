<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    session_start();
    $ccid = $_SESSION['ccid'];
    $ccoid = $_SESSION['ccoid'];





    $conn = mysqli_connect("sql1.njit.edu", "mp973", "Laptop2001.", "mp973");
    $result = mysqli_query($conn, "SELECT * FROM CostumerOrders");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $count =  mysqli_num_rows($result);
    $x = 0;

    
    while($row = mysqli_fetch_assoc($result)){


        if($row['OCostumerID']== $ccid && $row['OrderID']==$ccoid){
            
            $sql = "DELETE FROM `CostumerOrders` WHERE OCostumerID = $ccid;";
            
            break;

       
        }else{
            $x += 1;
            continue;
        }
    }

    if($x == $count){

        echo '<script type="text/javascript">';
        echo ' alert("Purchase ID does not exist for the costumer. Please check and re-enter purchase ID.")';  //not showing an alert box.
        echo '</script>';
        header('refresh:0.1; url= cancelorder.php');

        //redirect('returnorder.php');
    }

    //echo "Costumer not found.";

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo ' alert("Order Canceled.")';  //not showing an alert box.
        echo '</script>';
        header('refresh:0.1; url= cancelorder.php');
      } else {
        echo "Error deleting record: " . $conn->error;
      }


?>