<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
include "adm_head.php";
include '../backend/db.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $prosub=$_POST['pro_sub'];
    //echo "$prosub";

    $imag= "SELECT * FROM product WHERE pro_sub_cat = ?";
    $stmt = $conn->prepare($imag);
    $stmt->bind_param("s", $prosub);    
    $stmt->execute();
    $result1 = $stmt->get_result();
    if($result1->num_rows>0)
    {   echo "<p class='mt-12 text-center text-3xl font-serif '>".$prosub." </p>";
        echo " <div class='grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 m-6'>";
        while($row1=$result1->fetch_assoc())
        { 
            $imagepath=$row1['image_path'];
            $price=$row1['pro_price'];
            $detail=$row1['pro_detail'];

            echo "<div class='bg-white shadow-lg rounded-lg p-4'>";
            echo "<div>";
            echo "<img src='../images/".$imagepath."' alt='' class='h-80 w-80 object-full mt-4'>";
            echo "<p class='text-center font-semibold mt-1'>Price:".$price."</p>";
            echo "<p class='text-center font-semibold mt-1'>". $detail."</p>";
            echo "<div class='flex justify-between items-center mt-4'>";
            echo "<form action='del_pro.php' method='POST'>";
            echo " <input type='hidden' name='image' value='".$imagepath."'>";
            echo " <button class='bg-yellow-500 text-white px-3 py-1 rounded hover:bg-orange-600'>Delete</button>";
            echo " </form>";
            echo "<form action='pro_upd.php' method='POST'>";
            echo " <input type='hidden' name='image' value='".$imagepath."'>";
            echo "<button class='bg-orange-500 text-white px-3 py-1 rounded hover:bg-orange-600'>Update</button>";
            echo " </form>";
            echo " </div>";
            echo " </div>";
            echo " </div>";
        

        }
        echo " </div>";
    }
    else
    {
        echo "No Product is availabe";
    }
}
?> 
</body>
</html>
