<?php include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="HnF.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

</head>
<body style="font-family: 'Montserrat', Arial, Helvetica, sans-serif;">
    <div id="head-container">
        
        <div id="logo"><a href="home.php"><img id="logoimg" src="WT_ESP/logo3.png" alt="Shopping" ></a></div>
        <div id="search">
            <form method="get" action="search.php">
                <input id="search-box"type="text" name="key" placeholder="Search...">
                <!--<input id="search-btn"type="submit" name="search" value="Search">-->
                <button type="submit" id="search-btn" name="search" >
                    <img src="Images\search.png" height="20px" alt="Search"/>
                </button>
            </form>
        </div>
        <?php if (isset($_SESSION['username'])): ?>
            <p style='float:right;color:white;padding:30px;font-size:20px;'>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <?php endif ?>
    </div>
        <div class="navbar" id="menu" style="font-family: 'Montserrat', Arial, Helvetica, sans-serif;">
            <div class="left">
            <a href="home.php"><b>Home</b></a>
            <a href="category.php"><b>Categories</b></a>
            <a href="search.php"><b>Products</b></a>
            <a href="about-us.php"><b>About Us</b></a>
            <a href="form.php"><b>Contact Us</b></a>
            </div>
            <div class="right" id="notify">
                <a href="myorders.php">
                    <img src="Images\bell.png" height="40px"/>
                </a>
            </div>
            <div class="right" id="cart">
                <a class="right" href="cart.php">
                    <img src="Images\cart.png" height="40px"/>
                </a>
            </div>
            <div id="account" class="dropdown">
                <button class="dropbtn">
                    <img src="Images\acc.png" height="40px"/>
                </button>
                <div class="dropdown-content">
                    <a href="index.php?logout='1'">Log Out</a>
                    <a href="myorders.php">My Orders</a>
                    <a href="myacc.php">My Account</a>
                </div>
            </div>
        </div>
    
           
            

    <br>
</body>
</html>
