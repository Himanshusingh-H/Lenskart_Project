<?php
$email_id = $_POST['email_id'];
$password = $_POST['password'];

$con = new mysqli('localhost','root','','lenskart');
if($con->connect_error){
    die('Connection Failed :' .$con->connect_error);
}else{
    $stmt = $con->prepare("select * from user_register where email_id = ?");
    $stmt->bind_param('s', $email_id);
    $stmt->execute();
    $stmt_res = $stmt->get_result();
    if($stmt_res->num_rows > 0){
        $data = $stmt_res->fetch_assoc();
        if($data['password'] === $password){
            echo "Login Successfully";
        }else{
            echo "Invalid Email or pasword";
        }

    }else{
        echo "Invalid Email or Password";
    }
}
?>