
<?php
include 'db.php';

$img_path=$_POST['image'];

$sql="DELETE FROM product WHERE image_path=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("s",$img_path);
$result=$stmt->execute();

if($result)
{
    echo "<script>alert('Delete successful!'); window.location.href='adm_pan_women.php'</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}
$stmt->close();
$conn->close();

?>