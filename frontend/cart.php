<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
include '../backend/db.php';

$username= $_SESSION['name'];
$useremail=$_SESSION['email'];
$total_item=0;

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


$imag= "SELECT * FROM add_to_cart WHERE user_id = ?";
$stmt = $conn->prepare($imag);
$stmt->bind_param("s", $userid);
$stmt->execute();
$result1 = $stmt->get_result();

if($result1->num_rows>0)
{   $total_price=0;
    echo "<h1 class='text-center mt-5 font-bold text-3xl font-serif'>Your cart</h1>";
    while($row1=$result1->fetch_assoc())
    { 
        $imagepath=$row1['image'];
        $pro_price=$row1['price'];
        $pro_det=$row1['product_detail'];
        $pro_cat=$row1['prod_cat'];
        $total_price=$total_price+$pro_price;
        $total_item=$total_item+1;  
       
        echo "<div class= 'flex items-start w-3/4  m-4 border-2'>";
        echo " <img src='../" .$imagepath . "' alt='' class= 'h-48 w-48 object-fill ml-4 mt-4 mb-4 shadow-lg '/>";
        echo "<div class='mt-4 mx-8'>";
        echo " <p class='mt-4 font-serif text-2xl'>".$pro_det."</p>";
        echo " <p class= 'text-2xl font-serif'>category:-".$pro_cat."</p>"; 
        echo "<p class=' font-bold text-2xl font-serif '>price:- ".$pro_price."</p>";
        echo "<form action='../backend/rem_fro_cart.php' method='POST'>";
        echo "<input type='hidden' name='remove' value='$imagepath'>";
        echo "<button class='mt-4 h-10 w-48 bg-yellow-400 rounded-lg text-black'>Remove from cart</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
   
   echo "<div class= ' h-80 w-80 shadow-lg rounded-lg mt-4 mb-4 mx-96  border-2'>";
   echo " <p class='mt-4 font-serif text-xl px-4 text-zinc-600'>Price Detail</p>";
   echo "<hr class='mt-2'>";
   echo "<div class='flex flex-row justify-betweem px-4'>";
   echo " <p class='mt-4 font-serif text-xl'>Price (". $total_item." items)</p>";
   echo " <p class='font-serif text-xl mt-4 mx-12 text-green-500'>". $total_price."</p>";
   echo "</div>";
   echo "<div class='flex flex-row justify-betweem px-4'>";
   echo " <p class='mt-4 font-serif text-xl'>Delivery Charge</p>";
   echo " <p class='font-serif text-xl mt-4 mx-12 text-green-500'>40</p>";
   echo "</div>";
   $final_price=$total_price+40;
   echo "<hr class='mt-2'>";
   echo "<div class='flex flex-row justify-betweem px-4'>";
   echo " <p class='mt-4 font-serif text-xl'>Total Amount</p>";
   echo " <p class='font-serif text-xl mt-4 mx-12 text-green-500'>".$final_price."</p>";
   echo "</div>";
   echo "<hr class='mt-2'>";

   echo "</div>";
   echo "<form action='order.php' method='POST'> ";
   echo " <button class='mt-4 h-10 w-3/4 m-4 bg-yellow-400 rounded-lg text-black '>Placed Order</button>";
   echo " </form>";

}
else {
    echo "<h1 class=' text-3xl font-bold text-center mt-48 font-serif'>Cart is Empty</h1>";
}
$conn->close();
?>  
</body>
</html>
