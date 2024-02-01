<?php
    $link = mysqli_connect("sql1.njit.edu", "mp973", "Laptop2001.", "mp973");
    $table = 'CostumerOrders';
    $result = mysqli_query($link, "SELECT * FROM $table");
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment3</title>
    <link rel="stylesheet" href="styles1.css">
    
</head>
<body>
 
    <button onclick="location.href='index.php'" type="button" style="cursor: pointer;">HOME</button>
    <table algin="center" border="4px white solid" style="width:600px; line-height:30px" color="white">
        <tr>
            <th colspan="5"><h2>Order Records</h2></th>
        </tr>
        <t>
            <th>Book Name</th>
            <th>Address</th>
            <th>Book Seller ID</th>
            <th>Costumer ID</th>
            <th>Purchase ID</th>
        </t>
        <?php
            while($rows = mysqli_fetch_assoc($result))
            {
        ?> 
                <tr>
                    <td><?php echo $rows['BookOrdered']; ?></td>
                    <td><?php echo $rows['Address']; ?></td>
                    <td><?php echo $rows['BookSellerID']; ?></td>
                    <td><?php echo $rows['CostumerID']; ?></td>
                    <td><?php echo $rows['PurchaseID']; ?></td>
                </tr>       
        <?php
            }
        ?>
    </table>

    
</body>
</html>

