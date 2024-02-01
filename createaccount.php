<?php
    if(isset($_POST['submit'])){
    session_start();

    $_SESSION['cfname'] = htmlentities($_POST['cfname']);
    $_SESSION['costlname'] = htmlentities($_POST['costlname']);
    $_SESSION['costid'] = htmlentities($_POST['costid']);
    header('Location: createbackend.php');
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
    

<div class="container">
        <form id="form" method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1>The Story Keeper Book Store: Create An Account</h1>
            <div class="input-control">
                <label for="cfname">Costumer's First Name:</label>
                <div class="inRow">
                    <input id="cfname" name="cfname" type="text" placeholder="Example: John">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="costlname">Costumer's Last Name: </label>
                <div class="inRow">
                    <input id="costlname" name="costlname" type="text" placeholder="Example: Doe">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="costid">Costumer's ID Number: </label>
                <div class="inRow">
                    <input id="costid" name="costid" type="text" placeholder="Example: 23432423">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>

      
            <button type="submit" id="submit123" class="submit" name="submit" value = "submit">Submit</button>
         
    
        </form>
    </div>


</body>
</html>




