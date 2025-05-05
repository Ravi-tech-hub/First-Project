<?php
include 'db.php';

$img_path=$_POST['remove'];

$useremail = $_SESSION['email'];
$id_ = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($id_);
$stmt->bind_param("s", $useremail);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0)
{
    $row=$result->fetch_assoc();
    $userid = $row['id'];
    $sql="DELETE FROM add_to_cart WHERE image=? AND user_id=? limit 1";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("ss",$img_path,$userid);
    $result1=$stmt->execute();
    if($result1)
    {
        echo "<script>alert('Remove successful!'); window.location.href='../frontend/cart.php'</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
}




$stmt->close();
$conn->close();

?>