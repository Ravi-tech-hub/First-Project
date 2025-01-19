<?php
include '../backend/db.php';
$img_path=$_POST['image'];
//echo "$img_path"; 
$sql="DELETE FROM sub_cat WHERE image=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param("s",$img_path);
$result=$stmt->execute();

if($result)
{
    echo "<script>alert('Delete successful!'); window.location.href='adm_pan_women.php'</script>";
} 
else {
    echo "Error deleting record: " . $conn->error;
}
$stmt->close();
$conn->close();

?>