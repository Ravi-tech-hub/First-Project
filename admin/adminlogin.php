<?php
include '../backend/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $pass=$admin['password'];
        
        if ($password==$pass) {

            echo "<script>alert('Login successful!'); window.location.href='adm_pan_women.php'</script>";
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with this email.";
     }
    
    echo "<script>alert('$error'); window.location.href='adm_pan_women.php';</script>";
}
?>





