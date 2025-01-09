<?php
include 'db.php';

$img_path=$_POST['remove'];

$sql="DELETE FROM add_to_cart WHERE image=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("s",$img_path);
$result=$stmt->execute();

if($result)
{
    echo "<script>alert('Remove successful!'); window.location.href='cart.php'</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}
$stmt->close();
$conn->close();

?>