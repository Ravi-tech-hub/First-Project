<?php
include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_POST['user_name'];
    $email=$_POST['user_email'];
    $password=password_hash($_POST['user_password'],PASSWORD_DEFAULT);

    $checkStmt=$conn->prepare("SELECT * FROM users WHERE email=?");
    $checkStmt->bind_param('s',$email);
    $checkStmt->execute();
    $result= $checkStmt->get_result();

    if($result->num_rows>0)
    {
        echo "<script>alert('User with this email already exists. Please use another email or login.');
        window.location.href='sign_backend.php';</script>";
    }
    else
    {
        $stmt=$conn->prepare("INSERT INTO users (name,email,password) VALUES(?,?,?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Signup successful!'); window.location.href='../frontend/login.php';</script>";
            exit();
        } else {
            // Handle SQL execution errors
            echo "<script>alert('Error: ".$stmt->error . "');</script>";
        }

        $stmt->close();
    }
    $checkStmt->close();

}

?>