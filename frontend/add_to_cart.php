<?php
include '../backend/db.php';

if (!isset($_SESSION['name'])) {
    echo "<script>alert('Login first'); window.location.href='login.php'</script>";
}

$prodcat = $_POST['pro_cat'];
$pric = $_POST['price'];
$pro_detail = $_POST['pro_det'];
$img_path = $_POST['image'];

$useremail = $_SESSION['email'];
$id_ = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($id_);
$stmt->bind_param("s", $useremail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userid = $row['id'];
    $addtime=date('H:i:s');

    $sql = "INSERT INTO add_to_cart (prod_cat, user_id, price, product_detail, image,add_time) VALUES ('$prodcat','$userid','$pric','$pro_detail','$img_path','$addtime')";
    $result=$conn->query($sql);

    if ($result === TRUE) {
        echo "Product added to cart!";
    } else {
        echo "Error adding product.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>