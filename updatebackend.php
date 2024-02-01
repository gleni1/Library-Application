<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    session_start();
    $ucid = $_SESSION['ucid'];
    $coid = $_SESSION['coid'];
    $uorder = $_SESSION['uorder'];




    $conn = mysqli_connect("sql1.njit.edu", "mp973", "Laptop2001.", "mp973");
    $result = mysqli_query($conn, "SELECT * FROM CostumerOrders");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $count =  mysqli_num_rows($result);
    $x = 0;

    
    while($row = mysqli_fetch_assoc($result)){


        if($row['OCostumerID']== $ucid && $row['OrderID']==$coid){
            
            $sql = "UPDATE `CostumerOrders` SET `BookOrdered`= '$uorder' WHERE OCostumerID = $ucid;";
            
            break;

       
        }else{
            $x += 1;
            continue;
        }
    }

    if($x == $count){

        echo '<script type="text/javascript">';
        echo ' alert("Either Data Entered for Costumer ID or Product ID is incorrect. Please check your data.")';  //not showing an alert box.
        echo '</script>';
        header('refresh:0.1; url= updateorder.php');

        //redirect('returnorder.php');
    }

    //echo "Costumer not found.";

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">';
        echo ' alert("Order Updated.")';  //not showing an alert box.
        echo '</script>';
        // echo '<script type="text/javascript">';
        // echo 'swal("Success!", "Order Updated!", "success");';
        // echo '</script>';
       
    
        header('refresh:0.1; url= updateorder.php');
      } else {
        echo "Error deleting record: " . $conn->error;
      }


?>