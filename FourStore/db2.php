<?php
$mysqli = new mysqli("localhost", "root", "", "shop");

if ($mysqli == false) {
    die("ERROR: Could not connect. ".$mysqli->connect_error);
}

$sql = "INSERT INTO products(name,brand,category,price,qty)
          VALUES('Roadster Mens Full Sleeve T-Shirt','Roadster','Clothes', 899,10),
          ('US Polo Mens Half Sleeve T-Shirt','John Adair','Clothes', 1299,10),
          ('Levis Mens Jeans','Levis','Clothes', 2299,10),
          ('Soch Silk Saree','Soch','Clothes', 4699,10),
          ('Biba Womens Shirt','Biba','Clothes', 1499,10),
          ('Vero Moda Womens Jeans','Vero Moda','Clothes', 3499,10)
           ";

if ($mysqli->query($sql) == true)
{
    echo "Records inserted successfully.";
}
else
{
    echo "ERROR: Could not able to execute $sql. "
        .$mysqli->error;
}

$mysqli->close();
?>
