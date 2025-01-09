<?php
include 'db.php';

$username= $_SESSION['name'];
$useremail=$_SESSION['email'];

$prodcat = $_POST['pro_cat'];
$pric = $_POST['price'];
$pro_detail = $_POST['pro_det'];
$img_path=$_POST['image'];

$id_ = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($id_);
$stmt->bind_param("s", $useremail);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows>0)
{
    $row=$result->fetch_assoc();
    $userid=$row['id'];
}



$sql = "INSERT INTO add_to_cart (prod_cat,user_id,price,product_detail,image) VALUES ('$prodcat','$userid','$pric','$pro_detail','$img_path')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Add successful!'); window.location.href='cart.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
