<?php  
include('header.php');
$connect = mysqli_connect("localhost", "root", "", "shop");
$uname = $_SESSION['username'];

$query;

$brand;
$qty;
if(isset($_GET['add']))
{
    $pid = $_GET['pid'];
    $pname = $_GET['pname'];
    $q1="SELECT * FROM products WHERE id=$pid";
    $r = mysqli_fetch_array(mysqli_query($connect, $q1));
    $qval = $r['qty'];
    $cat = $r['category'];

    $price = $r['price'];
    if($qval>0)
    {
        $query="INSERT INTO cart(pid,pname,category,price) VALUES($pid,'$pname','$cat',$price)";
        $result = mysqli_query($connect, $query);
        echo "Product $pname is added to cart";
    }
    else
    {
        echo "<p style='text-align:center;margin:auto;width:600px;color:black;font-size:25px;padding:10px;background:#ff6b6b;border-radius:20px;'>
            Product '$pname' is out of stock</p>";
    }
}
else if(isset($_GET['rem']))
{
    $id = $_GET['rem'];
    $query="DELETE FROM cart WHERE id=$id";
    $result = mysqli_query($connect, $query);
}
else if(isset($_GET['clear']))
{
    $query="DELETE FROM cart WHERE 1";
    $result = mysqli_query($connect, $query);
    $query="TRUNCATE TABLE cart";
    $result = mysqli_query($connect, $query);
}
else if(isset($_GET['confirm']))
{
    $query="SELECT * FROM cart";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result)==0)
    {
        //echo "Cart is Empty";
    }
    else
    {
        while($row = mysqli_fetch_array($result))
        {   
            $pid = $row['pid'];
            $pname = $row['pname'];
            $q="INSERT INTO orders(uname,pid,pname,date) VALUES('$uname',$pid,'$pname',NOW())";
            $q1="SELECT qty FROM products WHERE id=$pid";
            $qval = mysqli_fetch_array(mysqli_query($connect, $q1))['qty']-1;
            $q2="UPDATE products SET qty=$qval WHERE id=$pid";
            $dec = mysqli_query($connect, $q2);
            $res = mysqli_query($connect, $q);
        }
        $query="DELETE FROM cart WHERE 1";
        $result = mysqli_query($connect, $query);
        $query="TRUNCATE TABLE cart";
        $result = mysqli_query($connect, $query);
        header("location: payment.php");
    }
}
?>
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Cart</title> 
           <link rel="stylesheet" type="text/css" href="cart.css?ver=<?php echo rand(111,999)?>"> 
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:1000px;margin:auto;border: 3px solid #2F4F4F;">  
                <p style='font-size:50px; margin-bottom:20px;' align="center">Cart</p>
                <p id="btnp">
                <a class="btn" id="clear" href="cart.php?clear=1">Clear Cart</a>
                <a class="btn" id="confirm" href="cart.php?confirm=1">Confirm Order</a>
                <a class="btn" id="continue" href="category.php">Continue shopping</a>
                </p>     
                <?php  
                $query = "SELECT * FROM cart ";  
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result)==0)
                {
                    echo "<h5 style='color:red;text-align:center'>Cart is Empty</h4><br>";
                }
                else
                {
                    echo "<table id='cart-table'>  
                    <tr>  
                         <th>Sl. No.</th>
                         <th> Images </th>
                         <th>Product ID</th>
                         <th>Name</th>
                         <th>Category</th>
                         <th>Price</th>
                         <th></th>  
                    </tr>";
                    $total=0.0;
                    $x="Images/fail.png";
                while($row = mysqli_fetch_array($result))  
                {
                    $id = $row['id'];  
                    $pid= $row['pid'];
                    $img = "Images/Products/".$pid.".jpg";
                    $name= $row['pname'];
                    $cat= $row['category'];
                    $price=$row['price'];
                    $total = $total + $price;
                    echo "  
                            <tr>
                                <td> $id </td>
                                <td> <a href='product.php?key=$pid'><img src=$img height='100px' style='max-height:100px;max-width:150px'/> </a> </td>
                                <td> $pid </td>  
                                <td> $name </td>
                                <td> $cat </td>
                                <td> Rs.$price </td>
                                <td> <a href='cart.php?rem=$id'> <img src=$x height='50px'/> </a> </td>
                            </tr>  
                        ";
                      
                }
                echo "</table>
                <br>
                <p style='font-style:30px;padding:20px;border-radius:10px;background:white;width:400px;display:inline-block;'>
                Your Cart Total is - <strong>Rs.$total</strong></p>
                <br>
                <br>
                ";
                }  
                ?>  
                  
            </div>

      </body>  
     <?php
include('footer.php');
 ?>
 </html>  

