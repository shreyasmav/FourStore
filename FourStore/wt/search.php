<?php  
include('header.php');
$connect = mysqli_connect("localhost", "root", "", "shop");
$key;
$q;
if(isset($_GET['key']) && ($_GET['key']!=""))
{
    $key = $_GET['key'];
    $q = "WHERE name LIKE '%$key%'";
    $pn = "Search Result";
} 
elseif(isset($_GET['cat']) && ($_GET['cat']!=""))
{
    $key = $_GET['cat'];
    $q = "WHERE category='$key'";
    $pn = $key;
}
else
{
    $key = "";
    $q = "";
    $pn = "All Products";
}
?>  
<!DOCTYPE html>  
<html>  
    <head>  
        <title><?php echo "$pn";?></title> 
        <link rel="stylesheet" type="text/css" href="search-css.css?ver=<?php echo rand(111,999)?>"> 
    </head>  
    <body>  
        <br /><br />  
        <div class="container" > 
        <!--style="width:1000px;margin:auto;border: 3px solid green;padding:50px;border-radius:50px;"--> 
            <p style='font-size:50px;margin-top:25px;margin-bottom:25px;'align="center"><?php echo "$pn";?></p>   
            <?php  
            $query = "SELECT * FROM products $q ORDER BY Name ASC";  
            $result = mysqli_query($connect, $query);
            if(mysqli_num_rows($result)==0)
            {
                echo "Product '$key' doesn't exist.<br>";
            }
            /*else
            {
                echo "<table class='pricing-table' align='center' id='pricing-table'>  
                <tr>  
                    <th>Image</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Availability<th>  
                </tr> ";
            } */ 
            while($row = mysqli_fetch_array($result))  
            {
                $id = $row['id'];
                $img = "Images/Products/".$id.".jpg";  
                $name= $row['name'];
                $brand= $row['brand'];
                $price= $row['price'];
                $qty = $row['qty'];
                if($qty>0){$av = "<font color='green'>In Stock</font>";}
                else{$av = "<font color='red'>Out of Stock</font>";}
                echo " 
                    <a href='product.php?key=$id' style='text-decoration: none;'>
                    <div class='prcont' style='margin:25px;padding: 25px;width:300px;height:400px;background-color:white;border-radius:25px;border: 3px solid black;text-align: center;display:inline-block;'> 
                        <img src=$img height='150px' style='max-height:150px;max-width:240px'/>
                        <p style='color:black;font-size:25px;margin-bottom:5px;'>$name</p>
                        <p style='color:grey;font-size:15px;margin-top:5px;'>By - $brand</p>
                        <p style='color:black;font-size:20px;'>Price - Rs.$price</p>
                        <p>$av</p>
                    </div> </a>
                    ";  
            }  
            ?>  
            </table>  
        </div>  
    </body>  
     <?php
include('footer.php');
 ?>
 </html>  