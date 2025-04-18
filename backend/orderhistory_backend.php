<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order history</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
include '../frontend/header.php';
include 'db.php';

$username= $_SESSION['name'];
$useremail=$_SESSION['email'];

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


$sel= "SELECT * FROM order_history  WHERE userid = ? ORDER BY order_date DESC, order_time DESC";
$stmt = $conn->prepare($sel);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result1 = $stmt->get_result();

if($result1->num_rows>0)
{   $total_price=0;
    echo "<h1 class='text-center mt-5 font-bold text-3xl font-serif'>Your Order</h1>";
    while($row1=$result1->fetch_assoc())
    {   
        $name=$row1['name'];
        $contact=$row1['mobile'];
        $pin=$row1['pincode'];
        $add=$row1['address'];
        $dis=$row1['district'];
        $product=$row1['prod_det'];
        $pri=$row1['price'];
        $image=$row1['image_path'];
        $date=$row1['order_date'];
        //$total_price=$total_price+$pro_price;  
        echo "<div class= 'flex items-start w-4/5  m-4 border-2'>";
        echo " <img src='../" .$image . "' alt=''  class= 'h-48 w-48 object-fill ml-4 mt-4 mb-4 shadow-lg '/>";
        echo "<div class='mt-4 mx-8'>";
        echo " <p class='mt-4 font-serif text-2xl'>".$product."</p>";
        echo " <p class= 'text-2xl font-serif'>price:-".$pri."</p>"; 
        echo "<p class=' font-bold text-2xl font-serif '>Delivery Detail</p>";
        echo " <p class= 'text-xl font-serif'>".$name."</p>";
        echo " <p class= 'text-xl font-serif'>".$add.", ".$dis." ,".$pin."  </p>";
        // echo " <p class= 'text-xl font-serif'> District:-".$dis."</p>";
        // echo " <p class= 'text-xl font-serif'>pincode:-".$pin."</p>";
        echo " <p class= 'text-xl font-serif'> order date:-".$date."</p>";
        echo "</div>";
        echo "</div>";
    }
    //echo "$total_price";
}
else {
    echo "<h1 class=' text-3xl font-bold text-center mt-48 font-serif'>No order!</h1>";
}
$conn->close();
?>  
</body>
</html>