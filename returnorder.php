<?php
    if(isset($_POST['submit'])){
    session_start();

    $_SESSION['rcid'] = htmlentities($_POST['rcid']);
    $_SESSION['cpid'] = htmlentities($_POST['cpid']);
    header('Location: returnbackend.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <!-- <script defer src="script.js"></script> -->
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

        #dialog{
            background-color: blue;
        }
    </style>
</head>
<body>

<!-- <button onclick="JSalert()">Click</button> -->
<ul class="nav">
  <li><a href="index.php">Home</a></li>
  <li><a href="index.php">Search Bookseller's Records</a></li>
  <li><a href="purchaseform.php">Costumer Purchase/Order</a></li>
  <li><a href="returnorder.php">Costumer's Book/Order Return</a></li>
  <li><a href="updateorder.php">Update A Costumer's Book Order</a></li>
  <li><a href="cancelorder.php">Cancel A Costumer's Book Order</a></li>
  <li><a href="createaccount.php">Create A Costumer's Account</a></li>
</ul>
    

<div class="container">
        <form id="form" method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1>The Story Keeper Book Store</h1>
            <div class="input-control">
                <label for="rcid">Costumer's ID Number:</label>
                <div class="inRow">
                    <input id="rcid" name="rcid" type="text" placeholder="Example: 123456">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="cpid">Costumer's Purchase ID: </label>
                <div class="inRow">
                    <input id="cpid" name="cpid" type="text" placeholder="Example: 23432423">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>

            <div class="checkbox">
                <label for="vehicle1">Check the box to request an Email Confirmation</label><br>
                <input type="checkbox" id="accept" name="accept" class="vehicle1" >
            </div>

            

            <button type="submit" id="submit123" class="submit" name="submit" value = "submit">Submit</button>
         
    
        </form>
    </div>


</body>
</html>

<!-- <script>
    confirm('Before you return an item please make sure the item was purchased from the store. Was it purchased from The Story Keeper Book Store? If not we cannot accept the return.');
</script> -->

<script type="text/javascript">
    swal({
        title: "Notice!",
        text: "Before you return an item please make sure the item was purchased from the store. Was it purchased from The Story Keeper Book Store? If not we cannot accept the return.",
        icon: "warning",
        buttons: true,
      
    });
</script>





