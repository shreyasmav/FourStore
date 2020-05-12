<?php  
include('header.php');
 $connect = mysqli_connect("localhost", "root", "", "shop");  
?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Product List</title>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">List of Products</h3>  
                <!--<br />  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />  -->
                <table class="table table-bordered">  
                     <tr>  
                          <th>Image</th>
                          <th>Name</th>
                          <th>Brand</th>  
                     </tr>  
                <?php  
                $query = "SELECT * FROM products ORDER BY Name ASC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {
                    $id = $row['id'];
                    $img = "Images/Products/".$id.".jpg";  
                    $name= $row['name'];
                    $brand= $row['brand'];
                     echo "  
                          <tr>  
                               <td> <img src=$img height='100px'/> </td>
                               <td> $name </td>
                               <td> $brand </td>
                          </tr>  
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