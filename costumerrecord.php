<?php
    $link = mysqli_connect("sql1.njit.edu", "mp973", "Laptop2001.", "mp973");
    $table = 'CostumerRecord';
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
            <th colspan="3"><h2>Costumer Records</h2></th>
        </tr>
        <t>
            <th>First Name</th>
            <th>Last Name</th>
            <th>ID</th>
        </t>
        <?php
            while($rows = mysqli_fetch_assoc($result))
            {
        ?> 
                <tr>
                    <td><?php echo $rows['FirstName']; ?></td>
                    <td><?php echo $rows['LastName']; ?></td>
                    <td><?php echo $rows['ID']; ?></td>
                </tr>       
        <?php
            }
        ?>
    </table>

</body>
</html>

