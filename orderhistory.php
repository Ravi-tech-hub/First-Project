<?php
include 'db.php';

$username= $_SESSION['name'];
$useremail=$_SESSION['email'];

$user_name=$_POST['name_'];
$mobile=$_POST['number'];
$pin=$_POST['pincode'];
$add=$_POST['address'];
$dis=$_POST['city'];

$id_ = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($id_);
$stmt->bind_param("s", $useremail);
$stmt->execute();
$result = $stmt->get_result();


if($result->num_rows>0)
{
    $row=$result->fetch_assoc();
    $userid=$row['id'];
    //echo "$userid";
}

$cart=" SELECT * FROM add_to_cart WHERE user_id=?";
$st=$conn->prepare($cart);
$st->bind_param("i", $userid);
$st->execute();
$result1=$st->get_result();

if($result1->num_rows>0)
{
    while($row1=$result1->fetch_assoc());
   {    
        $pri=$row1['price'];
        $prod=$row1['product_detail'];
        $image=$row1['image'];
       

        $sql = "INSERT INTO order_history (userid,name,mobile,pincode,address,district,prod_det,price,image_path) 
        VALUES ('$userid','$user_name','$mobile','$pin','$add','$dis',' $prod','$pri','$image')";
   }
}

// if ($conn->query($sql) === TRUE) {
//     echo "<script>alert('order successful!'); window.location.href='index.php'</script>";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

$conn->close();
?>
