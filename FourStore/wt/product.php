<?php  
include('header.php');
$connect = mysqli_connect("localhost", "root", "", "shop");
$id;
$query;
$name;
$brand;
$qty;
if(isset($_GET['key']))
{
if(($_GET['key']==""))
{
    echo "Page Not Found";
}
else 
{
    $id = $_GET['key'];
    $query = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($connect, $query);
    $img = "Images\Products\\$id.jpg";
    if(mysqli_num_rows($result)==0)
    {
        echo "Product  doesn't exist.<br>";
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $brand = $row['brand'];
        $qty = $row['qty'];
    }
}
}
else
{
    echo "Page Not Found";
}
?>
<!DOCTYPE html>  
 <html>  
    <head>  
        <title>Product Page</title>  
    </head>  
    <body>  
        <br />  
        <div id='box' style="width:70%;height:100%;margin:auto;text-align:center;border: 3px solid #2F4F4F;border-radius:25px;">  
            <h2 align="center" font="arial">Product Page</h2>
            <?php
                if(isset($_GET['key']) && ($_GET['key']!="") )
                {
                    if(mysqli_num_rows($result)==1)
                    {
                    echo "
                        <img src=$img height='200px' width=200px/><br>
                        <p style='font-size:30px;' ><b>$name</b></p>
                        <p style='font-size:20px;' >Brand - <b>$brand</b> </p>
                        <p style='font-size:15px;' > Stocks left - <strong>$qty</strong> </p>
                        
                        <a href='cart.php?add=1&pid=$id&pname=$name' style='padding: 10px;font-size: 15px;color: white;background: rgb(236, 128, 4);border: none;border-radius: 5px;text-decoration: none;'>
                        Add To Cart</a>
                        <br><br><br>
                        ";
                    }
                }
            ?>

        </div>
    </body>
        <?php
include('footer.php');
 ?>
</html>