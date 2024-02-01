<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    session_start();
    $cfname = $_SESSION['cfname'];
    $costlname = $_SESSION['costlname'];
    $costid = $_SESSION['costid'];

    $conn = new mysqli("sql1.njit.edu", "mp973", "Laptop2001.", "mp973");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = mysqli_query($conn, "SELECT * FROM CostumerRecord;");



    $count =  mysqli_num_rows($result);
    $x = 0;

    
    while($row = mysqli_fetch_assoc($result)){


        if($row['CID']== $costid){
            echo '<script type="text/javascript">';
            echo ' alert("Costumer already exists.")';  //not showing an alert box.
            echo '</script>';
            header('refresh:0.1; url= createaccount.php');
            //$sql = "DELETE FROM `CostumerOrders` WHERE OCostumerID = $ccid;";
            
        }else{
            $x += 1;
            continue;
        }
    }

    
    if($x == $count){

        $sql = "INSERT INTO `CostumerRecord` VALUES ('$cfname', '$costlname', $costid);";
        echo '<script type="text/javascript">';
        echo ' alert("Costumer Account Created.")';  //not showing an alert box.
        echo '</script>';
        header('refresh:0.1; url= createaccount.php');

        //redirect('returnorder.php');
    }


    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }



    
    $conn->close();

?>


