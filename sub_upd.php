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
    include 'db.php';
    $ima_path=$_POST['image'];
    //echo "$ima_path";

    $sql="SELECT * FROM sub_cat WHERE image=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("s",$ima_path);
    $stmt->execute();
    $result=$stmt->get_result();
    
    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        
    }

?>
    <h2 class=" text-center text-3xl font-bold font-serif mt-4">Update Sub Category</h2>
    
    <form action="sub_upd_backend.php"  method="POST" enctype="multipart/form-data">
        <input type="hidden" name="categ" value="<?php echo "".$row['category']."";?>">
        <label for="subcat" class="text-2xl font-bold font-serif mx-8 mt-6" >Product sub-category:-</label>
        <input type="text"  name="subcat" value="<?php echo " ".$row['sub_category']." ";?>" class="h-10 w-96 border-2 mt-6 rounded-lg shadow-lg font-serif p-4 ">
        <label for=" old_image" class="flex flex-row">
        <div class="text-2xl mx-8  mt-10 font-serif font-bold">Product Image</div>
        <img src="<?php echo "images/".$row['image']." ";?>" alt="" class=" w-32 h-32  mt-4  mb-4 object-cover rounded-lg shadow-lg ">
        </label>
        <input type="hidden" name="old_img" value="<?php echo "".$row['image']." ";?>">
        <label for="image" class="font-bold text-2xl font-serif mt-6 mx-8">Select New Image:-</label>
        <input type="file" name="image"  class="file:h-10 file:w-48 file:bg-indigo-50 file:text-indigo-700 file:rounded-full file:shadow-full file:border-0 file:outline-none ">
        <button class="bg-yellow-400 h-10 w-full mt-8 text-center text-white rounded-full shadow-full">Update</button>
        
        
    </form>
</body>
</html>
