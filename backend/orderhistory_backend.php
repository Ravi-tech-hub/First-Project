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
    echo "<h1 class='text-center mt-10 font-bold text-4xl text-blue-600 font-serif'>Your Order</h1>";
    echo "<div class='bg-white shadow-lg'>";
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
        
        echo "<div class= 'max-w-5xl mx-auto my-6 bg-white shadow-lg rounded-lg flex flex-col overflow-hidden md:flex-row'>";

        echo "<div class='flex-shrink-0'>";
        echo " <img src='../" .$image . "' alt=''  class= 'h-48 w-48 object-fill m-4 shadow-lg '/>";
        echo "</div>";

        echo "<div class='flex flex-col justify-between p-6 w-full'>";
        echo "<div>";
        echo " <p class='font-bold font-serif text-2xl text-gray-800 '>".$product."</p>";
        echo " <p class= ' font-medium  mt-2 text-2xl font-serif'>price:-".$pri."</p>"; 
        echo "<p class=' font-semibold  tetx-gray-600 text-2xl font-serif  mt-2'>Delivery Detail</p>";
        echo " <p class= 'text-xl text-gary-700 font-serif'>".$name."</p>";
        echo " <p class= 'text-xl text-gary-700 font-serif'>".$add.", ".$dis." ,".$pin."  </p>";
        // echo " <p class= 'text-xl font-serif'> District:-".$dis."</p>";
        // echo " <p class= 'text-xl font-serif'>pincode:-".$pin."</p>";
        echo " <p class= 'text-xl  text-gray-600 mt-2 font-serif'> order date:-".$date."</p>";
        echo "</div>";

        echo "</div>";
        echo "</div>";
    }
    //echo "$total_price";
}
else {
    echo "<h1 class=' text-3xl font-bold text-center mt-48 font-serif text-gray-500'>No order!</h1>";
}
$conn->close();
?>  
</body>
</html>