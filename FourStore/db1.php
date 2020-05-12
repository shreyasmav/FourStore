<?php

// checking connection
$conn = new mysqli('localhost','root','','shop');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql code to create table
$sql = "CREATE TABLE shop.orders(
    id int PRIMARY KEY AUTO_INCREMENT,
    pid int NOT NULL,
    pname varchar(100) NOT NULL,
    uname varchar(100) NOT NULL,
    date datetime
)";

$sq= "CREATE TABLE shop.cart(
    id int PRIMARY KEY AUTO_INCREMENT,
    pid int NOT NULL,
    pname varchar(100) NOT NULL,
    category varchar(50),
    price float(10,2)
)";

if ($conn->query($sql) === TRUE ) {
    echo "Table orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
if ($conn->query($sq) === TRUE ) {
    echo "Table cart created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
