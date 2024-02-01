<?php
    if(isset($_POST['submit'])){
        session_start(); // Start the session

        $_SESSION['cname'] = htmlentities($_POST['cfirstname']);
        $_SESSION['clname'] = htmlentities($_POST['clname']);
        $_SESSION['cid'] = htmlentities($_POST['cidnum']);
        $_SESSION['spurchase'] = htmlentities($_POST['spurchase']);

        $_SESSION['opurchase'] = htmlentities($_POST['opurchase']);
        $_SESSION['date'] = htmlentities($_POST['date']);
        $_SESSION['payment'] = htmlentities($_POST['payment']);
        $_SESSION['order'] = htmlentities($_POST['order']);
        $_SESSION['address'] = htmlentities($_POST['address']);

        
   
        header('Location: updatetable.php');

    }
?>


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
            <h1>The Story Keeper Book Store Purchase/Order Form</h1>
            <div class="input-control">
                <label for="cfirstname">Costumer's First Name:</label>
                <div class="inRow">
                    <input id="cfirstname" name="cfirstname" type="text" placeholder="Example: John">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="clname">Costumer's Last Name: </label>
                <div class="inRow">
                    <input id="clname" name="clname" type="text" placeholder="Example: Doe">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="cidnum">Costumer's ID Number:</label>
                <div class="inRow">
                    <input id="cidnum" name="cidnum" type="text" placeholder="Example: '2454345'">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <label for="spurchase">Costumer's In Store Purchase:</label>
                <div class="inRow">
                    <input id="spurchase" name="spurchase" type="text" placeholder="Example: Harry Potter">
                    <p>REQUIRED</p>
                </div>
                <p><span style="font-size: 9px; color:#85C1E9">NOTE: If costumer made an In Store purchase, <b>ONLY</b> fill out the In Store Purchase Field.
                    Same goes for Online Purchases. One of the fields <b>MUST</b> be left blank.</span></p>

                <div class="error"></div>
            </div>
            
            <div class="input-control">
                <label for="opurchase">Costumer's Online Purchase:</label>
                <div class="inRow">
                    <input id="opurchase" name="opurchase" type="text" placeholder="Example: Peter Pan">
                    <p id="req"></p>
                    <p>REQUIRED</p>
                </div>
                
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="date">Date and Time of Purchase:</label>
                <div class="inRow">
                    <input id="date" name="date" type="text" placeholder="Example: 01-01-1999">
                    <p id="req"></p>
                    <p>REQUIRED</p>
                </div>
                
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="payment">Payment Type:</label>
                <div class="inRow">
                    <input id="payment" name="payment" type="text" placeholder="Cash/Card">
                    <p id="req"></p>
                    <p>REQUIRED</p>
                </div>
                
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="order">Order Type:</label>
                <div class="inRow">
                    <input id="order" name="order" type="text" placeholder="Online/In Store">
                    <p id="req"></p>
                    <p>REQUIRED</p>
                </div>
                
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="address">Shipping Address:</label>
                <div class="inRow">
                    <input id="address" name="address" type="text" placeholder="123 Nowhere Rd">
                    <p id="req"></p>
                    <p>REQUIRED</p>
                </div>
                
                <div class="error"></div>
            </div>

            <div class="checkbox">
                <label for="vehicle1">Check the box to request an Email Confirmation</label><br>
                <input type="checkbox" id="accept" name="accept" class="vehicle1" >
            </div>

            <div class="transaction">
                <label for="cars">Select a transaction: </label>
                <select id="cars">
                    <option value="val1">Search A Book Seller's Accounts</option>
                    <option value="val2">Costumer Book Purchase</option>
                    <option value="val3">Costumer's Book Return</option>
                    <option value="val4">Update A Costumer's Order</option>
                    <option value="val5">Cancel A Costumer's Book Order</option>
                    <option value="val6">Search For A Book</option>
                    <option value="val7">Create A New Costumer Account</option>
                </select>
            </div>

            <button type="submit" id="submit123" class="submit" name="submit" value = "submit">Submit</button>
            <button type="reset">Reset</button>
    
        </form>
    </div>
</body>
</html>