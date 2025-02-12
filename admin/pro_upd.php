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
    include '../backend/db.php';
    $ima_path=$_POST['image'];

    $sql="SELECT * FROM product WHERE image_path=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("s",$ima_path);
    $stmt->execute();
    $result=$stmt->get_result();
    
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
    }

?>
    <h2 class=" text-center text-3xl font-bold font-serif mt-4">Update Product</h2>
    
    <form action="pro_upd_backend.php"  method="POST" enctype="multipart/form-data">
        <div class="flex flex-col">
        <label for="price" class="text-2xl font-bold font-serif mx-8 mt-6" >Product price</label>
        <input type="text"  name="price" value="<?php echo "".$row['pro_price']." ";?>" class="h-10 w-96 border-2 mt-6  mx-6 rounded-lg shadow-lg font-serif p-4 ">
        <label for="detail" class="text-2xl font-bold font-serif mx-8 mt-6" >Product Detail</label>
        <input type="text"  name="detail" value="<?php echo " ".$row['pro_detail']." ";?>" class="h-10 w-96 border-2 mt-6 mx-6 rounded-lg shadow-lg font-serif p-4 ">
        <label for="subcat" class="text-2xl font-bold font-serif mx-8 mt-6" >Product sub-category</label>
        <select name="pro_sub"  placeholder="Choose sub category" class="h-20 w-96 border-2  rounded-lg m-8
        focus:outline-blue-400 p-4">
        <option value="<?php echo "".$row['pro_sub_cat']."";?>"><?php echo "".$row['pro_sub_cat']."";?></option>

    <?php 
    include '../backend/db.php';
    
    $sql="SELECT * FROM sub_cat ";
    $result=$conn->query($sql);

    if($result->num_rows>0)
    {  while($row=$result->fetch_assoc())
        {
            $subcat=$row['sub_category'];
            $cat=$row['category'];
            if($cat=='women')
            {  
                echo" <option value='".$subcat."'>".$subcat."</option>";
            }
            if($cat=='men')
            { 
                echo" <option value='".$subcat."'>".$subcat."</option>";
            }
            if($cat=='kid')
            {  
                echo" <option value='".$subcat."'>".$subcat."</option>";
            }
           
        }
    }
    
    ?>
    </select>
        </div>

        <label for=" old_image" class="flex flex-row">
        <div class="text-2xl mx-8  mt-10 font-serif font-bold">Product Image</div>
        <img src="<?php echo "../images/$ima_path";?>" alt="" class=" w-32 h-32  mt-4  mb-4 object-cover rounded-lg shadow-lg ">
        <input type="hidden" name="old_img" value="<?php echo "$ima_path";?>">
        </label>
        <label for="image" class="font-bold text-2xl font-serif mt-6 mx-8">Select New Image:-</label>
        <input type="file" name="image" class="file:h-10 file:w-48 file:bg-indigo-50 file:text-indigo-700 file:rounded-full file:shadow-full file:border-0 file:outline-none ">
        <button class="bg-yellow-400 h-10 w-full mt-8  mb-6 text-center text-white rounded-full shadow-full">Update</button>
        
        
    </form>
</body>
</html>
