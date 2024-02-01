<?php
    if(isset($_POST['submit'])){
        session_start(); // Start the session

        $_SESSION['name'] = htmlentities($_POST['username']);
        $_SESSION['lname'] = htmlentities($_POST['lname']);
        $_SESSION['id'] = htmlentities($_POST['idnum']);
        $_SESSION['password'] = htmlentities($_POST['password']);
        $_SESSION['val'] = htmlentities($_POST['cars']);
        
        header('Location: bookseller.php');

    }
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script defer src="script.js"></script> 
    <style>
        ul.nav {
            margin:0;
            padding:0;
            list-style:none;
            height:36px; line-height:36px;
            background:#0d7963; 
            font-family:Arial, Helvetica, sans-serif;
            font-size:13px;
        }
        ul.nav li {
            border-right:1px solid #189b80; 
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

<!-- action=" echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" -->

    <div class="container">
        <form id="form" method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h1>The Story Keeper Book Store</h1>
            <div class="input-control">
                <label for="username">Book Seller's First Name:</label>
                <div class="inRow">
                    <input id="username" name="username" type="text" placeholder="Example: John">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="lname">Book Seller's Last Name: </label>
                <div class="inRow">
                    <input id="lname" name="lname" type="text" placeholder="Example: Doe">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password">Book Seller's Password: </label>
                <div class="inRow">
                    <input id="password"name="password" type="text" placeholder="Example: Ba9999bb$Bb9">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>  
            </div>
            <div class="input-control">
                <label for="idnum">Book Seller's ID:</label>
                <div class="inRow">
                    <input id="idnum" name="idnum" type="text" placeholder="Example: 2454345">
                    <p>REQUIRED</p>
                </div>
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="phone">Book Seller's Phone #:</label>
                <div class="inRow">
                    <input id="phone" name="phone" type="text" placeholder="Example: 555-555-555">
                    <p>REQUIRED</p>
                </div>
                
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="email">Book Seller's Email:</label>
                <div class="inRow">
                    <input id="email" name="email" type="text" placeholder="Example: abc@abc.com">
                    <p id="req"></p>
                </div>
                
                <div class="error"></div>
            </div>

            <div class="checkbox">
                <label for="vehicle1">Check the box to request an Email Confirmation</label><br>
                <input type="checkbox" id="accept" name="accept" class="vehicle1" >
            </div>

            <div class="transaction">
                <label for="cars">Select a transaction: </label>
                <select id="cars" name = 'cars'>
                    <option value="val1">Search A Book Seller's Accounts</option>
                    <option value="val2">Costumer Book Purchase</option>
                    <option value="val3">Costumer's Book Return</option>
                    <option value="val4">Update A Costumer's Order</option>
                    <option value="val5">Cancel A Costumer's Book Order</option>
                    <option value="val6">Create A New Costumer Account</option>
                </select>
            </div>

            <!-- <input onclick="validateInputs()" type="submit" id="submit123" class="submit" name="submit" value = "submit" > -->
            <!-- onclick="validateInputs()" -->
            <button type="submit" id="submit123" name="submit" onclick="validateInputs();">Submit</button> 
            <button type="reset">Reset</button>    
        </form>
    </div>
</body>
</html>
