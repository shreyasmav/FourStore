<?php include('header.php'); ?>
<!DOCTYPE html>  
<html>  
    <head>
        <link rel="stylesheet" type="text/css" href="category.css?ver=<?php echo rand(111,999)?>">  
        <title>Home</title>
        <style>
           
        </style>
    </head>  
    <body>
        <div id="container" name="cat">
            <div id='heading'> Categories </div>
            <a href="search.php?cat=Phones">
            <div class='category'>
                <div class='catimg'> <img src="Images\category\Phones.png" width="200px" height="200px"> </div>
                <div class='name'> Phones </div>
            </div></a>
            <a href="search.php?cat=Electronics">
            <div class='category'>
                <div class='catimg'> <img src="Images\category\Electronics.png" width="200px" height="200px"> </div>
                <div class='name'> Electronics </div>
            </div></a>
            <a href="search.php?cat=Books">
            <div class='category'>
                <div class='catimg'> <img src="Images\category\Books.png" width="200px" height="200px"> </div>
                <div class='name'> Books </div>
            </div></a>
            <a href="search.php?cat=Clothes">
            <div class='category'>
                <div class='catimg'> <img src="Images\category\Clothes.png" width="200px" height="200px"> </div>
                <div class='name'> Clothes </div>
            </div></a>
            <!--
            <a href="search.php?cat=*">
            <div class='category'>
                <div class='catimg'> <img src="Images\category\*.png"> </div>
                <div class='name'> * </div>
            </div></a>
            -->
        </div>
    </body>
       <?php
include('footer.php');
 ?>
</html>
                  