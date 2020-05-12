<?php  
include('header.php');
$connect = mysqli_connect("localhost", "root", "", "shop");
$uname = $_SESSION['username'];
?>  
<!DOCTYPE html>  
<html>  
     <head>  
          <title>My Orders</title> 
          <style>
               table{
                    background-color:white;
                    margin:auto;
               }
               tr:nth-child(even) {
                    background-color: #f2f2f2;
                    border-color: #f2f2f2;
               }
               th {
                    background-color: #2F4F4F;
                    color: white;
                    border: #2F4F4F;
               }
               td{
                    padding:10px;
                    text-align:center;
                    padding-left:20px;
                    padding-right:20px;
               }
          </style>
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:1000px;margin:auto;border: 3px solid #2F4F4F;border-radius:25px;">  
                <h2 align="center">My Orders</h2>  
                 
                <?php  
                $query = "SELECT * FROM orders WHERE uname='$uname'";  
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result)==0)
                {
                    echo "</table><br>";
                    echo "<p style='text-align:center;'>No orders yet.</p>";
                }
                else{
                     echo "
                     <table>  
                     <tr>  
                          <th>Order ID</th>
                          <th>Name</th>
                          <th>Date</th>  
                     </tr> 
                     ";
                }  
                while($row = mysqli_fetch_array($result))  
                {
                    $id = $row['id'];  
                    $pname= $row['pname'];
                    $date= $row['date'];
                     echo "  
                          <tr class='pricing-table'>  
                               <td> $id </td>
                               <td> $pname </td>
                               <td> $date </td>
                          </tr>  
                     ";  
                }  
                ?>  
                </table>  
                <br><br>
           </div>  
      </body>  
  <?php 
include('footer.php');
 ?>
 </html>  