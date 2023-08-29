<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$email_id = $_POST['email_id'];
$password = $_POST['password'];

//database connection
$con = new mysqli('localhost','root','','lenskart');
if($con->connect_error){
    die('Connection Failed :' .$con->connect_error);
}else{
    $stmt = $con->prepare("insert into user_register(firstname,lastname,phone,email_id,password) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss",$firstname,$lastname,$phone,$email_id,$password);
    $stmt->execute();
    echo "Register Successfully...";
    $stmt->close();
    $con->close();
}
?>