
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
include 'header.php';
include '../backend/db.php';

 if (!isset($_SESSION['name'])) {
         echo "<script>alert('Login first'); window.location.href='login.php'</script>";
 }

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


$imag= "SELECT * FROM add_to_cart WHERE user_id = ? ORDER BY add_time DESC  ";
$stmt = $conn->prepare($imag);
$stmt->bind_param("s", $userid);
$stmt->execute();
$result1 = $stmt->get_result();

if($result1->num_rows>0)
{   $total_price=0;
    echo "<h1 class='text-center mt-5 font-bold text-3xl font-serif'>Your cart</h1>";
    echo "<div class='flex justify-center w-full mt-8 gap-4'>";

    echo "<div class='w-2/3'>";
    while($row1=$result1->fetch_assoc())
    { 
        $imagepath=$row1['image'];
        $pro_price=intval($row1['price']);
        $pro_det=$row1['product_detail'];
        $pro_cat=$row1['prod_cat'];
        $total_price=$total_price+$pro_price;
        $total_item=$total_item+1; 

        echo "<div class= 'flex items-start p-4  m-4 border-2 rounded-lg shadow-sm '>";
        echo " <img src='../" .$imagepath . "' alt='' class= 'h-48 w-48 object-fill rounded-md '/>";
        echo "<div class='ml-6'>";
        echo " <p class='mb-2 font-serif text-2xl'>".$pro_det."</p>";
        echo " <p class= ' mb-2 text-2xl font-serif'>category:-".$pro_cat."</p>"; 
        echo "<p class=' mb-4 font-bold text-2xl font-serif '>price:- ".$pro_price."</p>";
        echo "<form action='../backend/rem_fro_cart.php' method='POST'>";
        echo "<input type='hidden' name='remove' value='$imagepath'>";
        echo "<button class='h-10 w-48 bg-yellow-400 rounded-lg text-black'>Remove from cart</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";

   echo "<div class='w-1/3'>";
   echo "<div class= 'shadow-lg rounded-lg   border-2 p-6 bg-white'>";
   echo " <p class='mb-4 font-serif text-xl  text-zinc-600'>Price Detail</p>";
   echo "<hr>";
   echo "<div class='flex flex-row justify-betweem mt-4'>";
   echo " <p class=' font-serif text-xl'>Price (". $total_item." items)</p>";
   echo " <p class='font-serif text-xl  text-green-500'>₹".$total_price."</p>";
   echo "</div>";
   echo "<div class='flex flex-row justify-betweem mt-2'>";
   echo " <p class=' font-serif text-xl'>Delivery Charge</p>";
   echo " <p class='font-serif text-xl  text-green-500'>40</p>";
   echo "</div>";
   $final_price=$total_price+40;
   echo "<hr class='my-4'>";
   echo "<div class='flex flex-row justify-betweem px-4'>";
   echo " <p class='font-serif text-xl'>Total Price</p>";
   echo " <p class='font-serif text-xl mx-2 text-green-500'>".$final_price."</p>";
   echo "</div>";
   echo "<hr class='mt-4'>";
   
   echo "<form action='order.php' method='POST'> ";
   echo " <button class='mt-6 h-10 w-full bg-yellow-400 rounded-lg text-black font-semibold'>Place Order</button>";
   echo " </form>";
   echo "</div>";
   echo "</div>";
   echo "</div>";
}

else {
    echo "<h1 class=' text-3xl font-bold text-center mt-48 font-serif'>Cart is Empty</h1>";
}
$conn->close();
?>  
</body>
</html>
